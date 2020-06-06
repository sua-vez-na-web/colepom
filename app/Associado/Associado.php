<?php

namespace App\Associado;

use Illuminate\Database\Eloquent\Model;

use App\Sindicato;

class Associado extends Model
{
    protected $table = 'associados';
    protected $primaryKey = 'ASS_ID';
    const CREATED_AT = 'ASS_CRIADO';
    const UPDATED_AT = 'ASS_ATUALIZADO';


    function getSindicato() {
        $sindicato = Sindicato::where('SIN_ID', $this->SIN_ID)->first();
        return $sindicato;
    }
}
