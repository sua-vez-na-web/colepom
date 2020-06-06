<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParSubcategorias extends Model
{
    protected $table = 'par_subcategorias';
    protected $primaryKey = 'SPA_ID';
    const CREATED_AT = 'SPA_CRIADO';
    const UPDATED_AT = 'SPA_ATUALIZADO';

    function getCategorias() {
        $categoria = ParCategoria::where('SPA_ID', $this->SPA_ID)->first();
        return $categoria;
    }
}
