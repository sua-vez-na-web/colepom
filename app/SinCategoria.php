<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SinCategoria extends Model
{
    protected $table = 'sin_categorias';
    protected $primaryKey = 'SCA_ID';
    const CREATED_AT = 'SCA_CRIADO';
    const UPDATED_AT = 'SCA_ATUALIZADO';

    function getSubcategorias() {
        $subcategorias = SinSubcategoria::where('SCA_ID', $this->SCA_ID)->get();
        return $subcategorias;
    }
}
