<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSyndicate;
use App\Models\Category;
use App\Models\Role;
use App\Models\Syndicate;
use App\Models\User;
use App\Services\AsaasService;


class SyndicatesController extends Controller
{
    public function index()
    {
        $syndicates = Syndicate::paginate();
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

        #create user for syndicate
        $user = User::createUserAccount($request->email, $request->username, Role::SYNDICATE);

        #create syndicate
        $data['user_id'] = $user->id;
        $syndicate = Syndicate::create($data);

        #create asaas customer;
        $result = AsaasService::createCustomer($syndicate);
        if ($result['success']) {
            $syndicate->asaas_id = $result['object']->id;
            $syndicate->save();
        } else {
            dd('nao criou' . $result['message']['errors']);
        }
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

        if (!$syndicate = Syndicate::find($id)) {
            return redirect()->back();
        };

        $syndicate->update($request->all());

        return redirect()->route('syndicates.index');
    }

    public function destroy($id)
    {
        if (!$syndicate = Syndicate::find($id)) {
            return redirect()->back();
        };

        $syndicate->delete();

        return redirect()->route('syndicates.index');
    }
}
