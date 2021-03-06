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
use App\Services\AsaasService;
use Illuminate\Support\Facades\Storage;


class SyndicatesController extends Controller
{
    public function index()
    {
        $syndicates = Syndicate::latest()->get();
        return view('admin.pages.syndicates.index', compact('syndicates'));
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
}
