<?php

namespace App\Traits;

use App\Scopes\PartnerScope;

trait PartnerTrait
{
    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub        

        static::addGlobalScope(new PartnerScope);
    }
}