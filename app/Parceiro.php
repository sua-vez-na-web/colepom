<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\ParCategoria;
use App\Estabelecimento;

class Parceiro extends Model
{
    protected $table = 'parceiros';
    protected $primaryKey = 'PAR_ID';
    const CREATED_AT = 'PAR_CRIADO';
    const UPDATED_AT = 'PAR_ATUALIZADO';

    public function getEstabelecimento() {
      $estabelecimento = Estabelecimento::where('PAR_ID', $this->PAR_ID)->first();
      return $estabelecimento;
    }

    public function getCategoria() 
    {
      $categoria = DB::table('parceiros')        
      ->leftJoin('rel_par_subcategorias', 'parceiros.PAR_ID', '=', 'rel_par_subcategorias.PAR_ID')
      ->leftJoin('par_categorias', 'par_categorias.PAC_ID', '=', 'rel_par_subcategorias.PAC_ID')
      ->where('parceiros.PAR_ID', '=', $this->PAR_ID)
      ->first(); 
      return $categoria;
    }

    static function getCategorias() 
    {
      $categorias = ParCategoria::all();
      return $categorias;
    }

    public function getSubcategorias() 
    {
      $subcategorias = DB::table('rel_par_subcategorias')        
      ->leftJoin('par_subcategorias', 'rel_par_subcategorias.SPA_ID', '=','par_subcategorias.SPA_ID' )
      ->where('rel_par_subcategorias.PAR_ID', '=', $this->PAR_ID)
      ->get(); 
      return $subcategorias;
    }
}
