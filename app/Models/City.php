<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $table = 'cidade';

    public static function getCodeByIbge($ibge = null)
    {
        $city = self::where('ibge', $ibge)->first();

        if ($city) {
            return $city->id;
        } else {
            return null;
        }
    }
}
