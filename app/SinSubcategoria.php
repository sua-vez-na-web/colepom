<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SinSubcategoria extends Model
{
    protected $table = 'sin_subcategorias';
    protected $primaryKey = 'SSC_ID';
    const CREATED_AT = 'SSC_CRIADO';
    const UPDATED_AT = 'SSC_ATUALIZADO';

    function getCategorias() {
        $categoria = SinCategoria::where('SSC_ID', $this->SCA_ID)->first();
        return $categoria;
    }
}
