<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public $table = 'estado';

    public static function getCodeByUf($uf = null)
    {
        $state = self::where('uf', $uf)->first();

        if ($state) {
            return $state->id;
        } else {
            return null;
        }
    }
}
