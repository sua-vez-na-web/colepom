<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Parceiro\Parceiro;
use App\Estabelecimento;

class Promocao extends Model
{
  protected $table = 'promocoes';
  protected $primaryKey = 'PRO_ID';
  const CREATED_AT = 'PRO_CRIADO';
  const UPDATED_AT = 'PRO_ATUALIZADO';

    function getParceiro() {
      $parceiro = Parceiro::where('PAR_ID', $this->PAR_ID)->first();
      return $parceiro;
    }

    function getEstabelecimento() {
      $estabelecimento = Estabelecimento::where('PAR_ID', $this->PAR_ID)->first();
      return $estabelecimento;
    }

    function getCategoria() 
    {
      $categoria = DB::table('promocoes')        
      ->leftJoin('rel_pro_subcategorias', 'promocoes.PRO_ID', '=', 'rel_pro_subcategorias.PRO_ID')
      ->leftJoin('pro_categorias', 'pro_categorias.PCA_ID', '=', 'rel_pro_subcategorias.PCA_ID')
      ->where('promocoes.PRO_ID', '=', $this->PRO_ID)
      ->first(); 
      return $categoria;
    }

    static function getCategorias() 
    {
      $categorias = ProCategoria::all();
      return $categorias;
    }

    function getSubcategorias() 
    {
      $subcategorias = DB::table('rel_pro_subcategorias')        
      ->leftJoin('pro_subcategorias', 'rel_pro_subcategorias.SPC_ID', '=','pro_subcategorias.SPC_ID' )
      ->where('rel_pro_subcategorias.PRO_ID', '=', $this->PRO_ID)
      ->get(); 
      return $subcategorias;
    }
}
