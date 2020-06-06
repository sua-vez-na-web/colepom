<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProCategoria extends Model
{
    protected $table = 'pro_categorias';
    protected $primaryKey = 'PCA_ID';
    const CREATED_AT = 'PCA_CRIADO';
    const UPDATED_AT = 'PCA_ATUALIZADO';

    function getSubcategorias() {
        $subcategorias = ProSubcategorias::where('PCA_ID', $this->PCA_ID)->get();
        return $subcategorias;
    }
}
