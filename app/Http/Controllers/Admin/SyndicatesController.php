<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSyndicate;
use App\Models\Category;
use App\Models\Role;
use App\Models\Syndicate;
use App\Models\User;
use App\Notifications\NewAffiliateAproovedBySyndicate;
use App\Notifications\UserActivated;
use Illuminate\Support\Facades\Storage;

use Yajra\DataTables\DataTables;

class SyndicatesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Syndicate::query()->select(sprintf('%s.*', (new Syndicate)->table));
            $table = DataTables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $btn = "<a href='syndicates/$row->id/edit' class='btn btn-primary btn-xs'>
                <i class='fa fa-pencil'></i> Editar
                </a><a href='syndicates/$row->id/post' class='btn btn-primary btn-xs'>
                <i class='fa fa-pencil'></i> Adicionar Notícia
                </a>";
              
                return $btn;
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });


            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.pages.syndicates.index');
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('admin.pages.syndicates.create', compact('categories'));
    }

    public function store(StoreUpdateSyndicate $request)
    {
        $data = $request->all();

        $user = User::createUserAccount($request->email, $request->name, Role::SYNDICATE);

        $data['user_id'] = $user->id;
        Syndicate::create($data);

        return redirect()->route('syndicates.index')->with('msg', '');
    }


    public function show($id)
    {
        if (!$syndicate = Syndicate::find($id)) {
            return redirect()->back();
        };

        return view('admin.pages.syndicates.show', compact('syndicate'));
    }


    public function edit($id)
    {
        if (!$syndicate = Syndicate::find($id)) {
            return redirect()->back();
        };
        $categories = Category::pluck('name', 'id');
        return view('admin.pages.syndicates.edit', compact('syndicate', 'categories'));
    }


    public function update(StoreUpdateSyndicate $request, $id)
    {
        $data = $request->all();

        // dd($data);
        if (!$syndicate = Syndicate::find($id)) {
            return redirect()->back();
        };


        if ($request->hasFile('brand')) {
            Storage::delete($syndicate->brand);
            $data['brand'] = $request->brand->store('profiles');
        }


        $syndicate->update($data);


        return redirect()->route('syndicates.index');
    }

    public function destroy($id)
    {
        if (!$syndicate = Syndicate::find($id)) {
            return redirect()->back();
        };

        $syndicate->user->delete();
        $syndicate->delete();

        return redirect()->route('syndicates.index');
    }

    public function aproove($id)
    {

        #active affiliate
        $syndicate = Syndicate::find($id);
        $syndicate->is_aprooved = 1;
        $syndicate->save();

        #active user
        $user = User::find($syndicate->user_id);
        $user->is_active = 1;
        $user->save();

        #notify user
        $user->notify(new UserActivated($user));

        #notify Admins
        $admins = User::where('role_id', Role::ADMINISTRATOR)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewAffiliateAproovedBySyndicate($admin, $user));
        }

        return redirect()->back()->with('msg', 'Sindicato Aprovado!');
    }

    public function set($id)
    {

        $syndicates = Syndicate::find($id);
        return redirect()->route('posts.create', compact('syndicates'));
    }
}
