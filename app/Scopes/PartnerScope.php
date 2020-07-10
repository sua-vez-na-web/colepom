<?php

namespace App\Scopes;

use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class PartnerScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        $user = Auth::user();

        if($user && $user->role_id != Role::ADMINISTRATOR){
            $partner_id = $user->partner->id;

            $builder->where('partner_id', $partner_id);
        }
        
    }
}