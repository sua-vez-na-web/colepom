<?php

namespace App\Scopes;

use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class AffiliatesScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        $user = Auth::user();

        if($user->role_id != Role::ADMINISTRATOR){
            $syndicate_id = $user->syndicate->id;

            $builder->where('syndicate_id', $syndicate_id);
        }
        
    }
}