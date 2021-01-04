<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateAffiliate;
use App\Models\Affiliate;
use App\Models\Role;
use App\Models\Syndicate;
use App\Models\User;
use App\Notifications\NewAffiliateAproovedBySyndicate;
use App\Notifications\UserActivated;
use Illuminate\Support\Facades\Auth;

class AffiliatesController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        if ($user->role_id == Role::ADMINISTRATOR) {
            $affiliates = Affiliate::latest()->get();
        } else {
            $affiliates = Affiliate::where('syndicate_id', $user->syndicate->id)->get();
        }

        return view('admin.pages.affiliates.index', compact('affiliates'));
    }

    public function create()
    {
        $user = Auth::user();

        if ($user->role_id == Role::ADMINISTRATOR) {
            $syndicates = Syndicate::pluck('name', 'id');
        } else {
            $syndicates = Syndicate::where('user_id', $user->id)->pluck('name', 'id');
        }

        return view('admin.pages.affiliates.create', compact('syndicates'));
    }


    public function store(StoreUpdateAffiliate $request)
    {
        $data = $request->all();

        $user = Auth::user();

        $AffiliateUser = User::createUserAccount($request->email, $request->username, Role::AFFILIATE);

        if ($user->role_id == Role::ADMINISTRATOR) {
            $syndicate = Syndicate::find($request->syndicate_id);
            $data['syndicate_id'] = $syndicate->id;
        } else {
            $data['syndicate_id'] = $user->syndicate->id;
        }

        $data['user_id'] = $AffiliateUser->id;

        Affiliate::create($data);

        return redirect()->route('affiliates.index');
    }


    public function show($id)
    {
        if (!$affiliate = Affiliate::find($id)) {
            return redirect()->back();
        };

        return view('admin.pages.affiliates.show', compact('affiliate'));
    }

    public function edit($id)
    {
        if (!$affiliate = Affiliate::find($id)) {
            return redirect()->back();
        };

        return view('admin.pages.affiliates.edit', compact('affiliate'));
    }


    public function update(StoreUpdateAffiliate $request, $id)
    {

        if (!$affiliate = Affiliate::find($id)) {
            return redirect()->back();
        };

        $affiliate->update($request->all());

        return redirect()->route('affiliates.index');
    }

    public function destroy($id)
    {
        if (!$affiliate = Affiliate::find($id)) {
            return redirect()->back();
        };

        $affiliate->delete();

        return redirect()->route('affiliates.index');
    }

    public function aproove($id)
    {

        #active affiliate
        $affiliate = Affiliate::find($id);
        $affiliate->is_aprooved = 1;
        $affiliate->save();

        #active user
        $user = User::find($affiliate->user_id);
        $user->is_active = 1;
        $user->save();

        #notify user
        $user->notify(new UserActivated($user));

        #notify Admins
        $admins = User::where('role_id', Role::ADMINISTRATOR)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewAffiliateAproovedBySyndicate($admin, $user));
        }

        return redirect()->back()->with('msg', 'Associado Aprovado!');
    }
}
