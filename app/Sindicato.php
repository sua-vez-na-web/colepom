<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sindicato extends Model
{
    protected $table = 'sindicatos';
    protected $primaryKey = 'SIN_ID';
    const CREATED_AT = 'SIN_CRIADO';
    const UPDATED_AT = 'SIN_ATUALIZADO';


    function getCategoria() 
    {
        $categoria = DB::table('sindicatos')        
        ->leftJoin('rel_sin_subcategorias', 'sindicatos.SIN_ID', '=', 'rel_sin_subcategorias.SIN_ID')
        ->leftJoin('sin_categorias', 'sin_categorias.SCA_ID', '=', 'rel_sin_subcategorias.SCA_ID')
        ->where('sindicatos.SIN_ID', '=', $this->SIN_ID)
        ->first(); 
        return $categoria;
    }

    static function getCategorias() 
    {
        $categorias = SinCategoria::all();
        return $categorias;
    }

    function getSubcategorias() 
    {
        $subcategorias = DB::table('rel_sin_subcategorias')        
        ->leftJoin('sin_subcategorias', 'rel_sin_subcategorias.SSC_ID', '=','sin_subcategorias.SSC_ID' )
        ->where('rel_sin_subcategorias.SIN_ID', '=', $this->SIN_ID)
        ->get(); 
        return $subcategorias;
    }





}
