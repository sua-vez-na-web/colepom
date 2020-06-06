<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParCategoria extends Model
{
    protected $table = 'par_categorias';
    protected $primaryKey = 'PAC_ID';
    const CREATED_AT = 'PAC_CRIADO';
    const UPDATED_AT = 'PAC_ATUALIZADO';

    function getSubcategorias() {
        $subcategorias = ParSubcategorias::where('PAC_ID', $this->PAC_ID)->get();
        return $subcategorias;
    }
}
