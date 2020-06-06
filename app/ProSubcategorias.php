<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProSubcategorias extends Model
{
    protected $table = 'pro_subcategorias';
    protected $primaryKey = 'SPC_ID';
    const CREATED_AT = 'SPC_CRIADO';
    const UPDATED_AT = 'SPC_ATUALIZADO';

    function getCategorias() {
        $categoria = ProCategoria::where('SPC_ID', $this->SPC_ID)->first();
        return $categoria;
    }
}
