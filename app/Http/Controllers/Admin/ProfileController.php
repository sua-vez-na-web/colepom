<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Role;
use App\Models\Syndicate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        $profile = $this->getProfile($user);

        return view('admin.pages.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();

        $profile = $this->getProfile($user);

        if ($request->hasFile('brand')) {
            Storage::delete($profile->brand);
            $data['brand'] = $request->brand->store('profiles');
        }

        $profile->update($data);

        return redirect()->back()->with('msg', 'Dados Atualizado! Obrigado');
    }

    public function updatePassword(Request $request)
    {

        $user = Auth::user();

        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->back()->with('msg', 'Sua senha foi alterada!');
    }

    private function getProfile($user)
    {
        switch ($user->role_id) {
            case Role::PARTNER:
                $profile = Partner::where('user_id', $user->id)->first();
                break;
            case Role::SYNDICATE:
                $profile = Syndicate::where('user_id', $user->id)->first();
                break;
            default:
                $profile = $user;
                break;
        }
        return $profile;
    }
}
