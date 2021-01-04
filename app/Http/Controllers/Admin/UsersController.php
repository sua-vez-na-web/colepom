<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Notifications\NewUserActivated;

class UsersController extends Controller
{
    public function index(Request $request)
    {

        $users = User::latest()->get();

        return view('admin.pages.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('admin.pages.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);


        $user = User::create($data);

        if ($user->is_active == 1) {
            $user->notify(new NewUserActivated($user));
        }

        return redirect()->route('users.index');
    }


    public function show($id)
    {
        if (!$user = User::find($id)) {
            return redirect()->back();
        };

        return view('admin.pages.users.show', compact('user'));
    }

    public function edit($id)
    {
        if (!$user = User::find($id)) {
            return redirect()->back();
        };
        $roles = Role::pluck('name', 'id');
        return view('admin.pages.users.edit', compact('user', 'roles'));
    }


    public function update(Request $request, $id)
    {

        if (!$user = User::find($id)) {
            return redirect()->back();
        };

        $notify = $user->is_active == 0;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->is_active = $request->is_active;

        if ($request->has('password') && $request->password != null) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        if ($notify)
            $user->notify(new NewUserActivated($user));

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        if (!$user = User::find($id)) {
            return redirect()->back();
        };

        $user->delete();

        return redirect()->route('users.index');
    }
}
