<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sindicato;
use App\Parceiro;
use App\Promocao;
use App\Cupom;
use App\Estabelecimento;
use App\SinCategoria;
use App\SinSubcategoria;
use App\ProCategoria;
use App\ProSubcategorias;
use App\ParCategoria;
use App\ParSubcategorias;
use Illuminate\Support\Facades\DB;
use URL;

class VisitanteController extends Controller
{
  function index() {

    $promocoes = DB::table('parceiros')
    ->leftJoin('promocoes', 'parceiros.par_id', '=', 'promocoes.par_id')
    ->leftJoin('estabelecimentos', 'parceiros.par_id', '=', 'estabelecimentos.par_id')
    ->get();

    return view('index',[
        'promocoes' => $promocoes
    ]);
  }

  function promocoes() {
    $promocoes = Promocao::all();         
    $categorias = ProCategoria::all();  
    return view('cupons',[
            'promocoes' => $promocoes,
            'categorias' => $categorias
        ]);
  }

  function promocoesCat(Request $request) {
    $subcategorias = $request->subcategorias;
    
    if($subcategorias)
    {
        $promocoes = DB::table('rel_pro_subcategorias')
        ->leftJoin('promocoes', 'promocoes.PCA_ID', '=', 'rel_pro_subcategorias.PCA_ID')
        ->whereIn('PCA_ID', $subcategorias?$subcategorias:[])
        ->select('promocoes.*')
        ->groupBy('promocoes.PCA_ID')
        ->get();
    }
    else
    {
        $promocoes = Promocao::all();
    }
    
    $categorias = ProCategoria::all();
    
    return view('cupons',[
        'promocoes' => $promocoes,
        'categorias' => $categorias
      ]);
  }

  function promocao($promocao_id) {

    $promocao = Promocao::find($promocao_id);
    
    $estabelecimento = DB::table('parceiros')        
    ->leftJoin('estabelecimentos', 'parceiros.par_id', '=', 'estabelecimentos.par_id')
    ->where('parceiros.par_id', '=', $promocao->PAR_ID)
    ->get();   
    
    $promocoes = DB::table('promocoes')
    ->where('promocoes.par_id', '=', $promocao->PAR_ID)
    ->get();

    return view('promocao')->with(['parceiro' => $estabelecimento[0], 'promocao' => $promocao, 'promocoes' => $promocoes]);
  }

  function parceiros() {
    $parceiros = Parceiro::all(); 
    $categorias = ParCategoria::all();         
    return view('parceiros',[
        'parceiros' => $parceiros,
        'categorias' => $categorias
    ]);
  }

  function parceirosCat(Request $request) {

    $subcategorias = $request->subcategorias;
    
    if($subcategorias)
    {
        $parceiros = DB::table('rel_par_subcategorias')
        ->leftJoin('parceiros', 'parceiros.PAR_ID', '=', 'rel_par_subcategorias.PAR_ID')
        ->whereIn('PAR_ID', $subcategorias?$subcategorias:[])
        ->select('parceiros.*')
        ->groupBy('parceiros.PAR_ID')
        ->get();
    }
    else
    {
        $parceiros = Parceiro::all();
    }
    
    $categorias = ParCategoria::all();
    
    return view('organizacoes',[
        'organizacoes' => $organizacoes,
        'categorias' => $categorias
      ]);
  }

  function parceiro($parceiro_id) {        
    $estabelecimento = DB::table('parceiros')        
    ->leftJoin('estabelecimentos', 'parceiros.PAR_ID', '=', 'estabelecimentos.PAR_ID')
    ->where('parceiros.PAR_ID', '=', $parceiro_id)
    ->get(); 
           
    $promocoes = DB::table('PROMOCOES')
    ->where('PROMOCOES.PAR_ID', '=', $parceiro_id)
    ->get();

    return view('parceiro')->with(['estabelecimento' => $estabelecimento[0], 'promocao' => null, 'promocoes' => $promocoes]);
  }

  
  function organizacoes() 
  {
    $organizacoes = Sindicato::all(); 
   // $categorias = SinCategoria::all();
    $categorias = $this->categoriaSubcategoria();
    
    return view('organizacoes',[
        'organizacoes' => $organizacoes,
        'categorias' => $categorias
      ]);
  }

  function organizacoesCat(Request $request) {

    $subcategorias = $request->subcategorias;
    
    if($subcategorias)
    {
        $organizacoes = DB::table('rel_sin_subcategorias')
        ->leftJoin('sindicatos', 'sindicatos.SIN_ID', '=', 'rel_sin_subcategorias.SIN_ID')
        ->whereIn('SSC_ID', $subcategorias?$subcategorias:[])
        ->select('sindicatos.*')
        ->groupBy('sindicatos.SIN_ID')
        ->get();
    }
    else
    {
        $organizacoes = Sindicato::all();
    }

    $categorias = SinCategoria::all();
    
    return view('organizacoes',[
        'organizacoes' => $organizacoes,
        'categorias' => $categorias
      ]);
  }

  

  function organizacao($organizacao_id) {
    $organizacao = Sindicato::find($organizacao_id);        
    return view('organizacao')->with(['organizacao' => $organizacao]);
  }

  function oferta() {
    return view('oferta');
  }

  
  public function categoriaSubcategoria($id=0,$conta=1,$pertence=0)
  {
    $sql1 = DB::table('sin_categorias')->where('SCA_PARENTE',$id)->get();

    $options = null;

    foreach($sql1 as $i) 
    {
        if($i->SCA_PARENTE == $pertence)
        {
            $options .= '<li class="nav-item"><a href="'.URL::route('organizacoes', $i->SCA_ID).'" class="nav-link link-cat">'.$i->SCA_NOME.'</a></li>';
        }else{ 
            $conta++;
            $options .= '<li class="nav-item"><a href="" class="nav-link">'.$i->SCA_NOME.'</li></a>';
        }
        $options .= $this->categoriaSubcategoria($i->SCA_ID,$conta);
    }
    return $options;
  }

  public function logarAssociado()
  {
    return view('logar-associado');
  }
}
