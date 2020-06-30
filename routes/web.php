<?php
use App\Http\Middleware\CheckAdminAuth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();


/**
 * Site Routes
 */
Route::get('/', 'VisitanteController@index')->name('index');

Route::get('/organizacoes/{id?}', 'VisitanteController@organizacoes')->name('organizacoes');
Route::post('/organizacoes', 'VisitanteController@organizacoesCat')->name('organizacoesCat');

Route::get('/organizacao/{organizacao_id}', 'VisitanteController@organizacao')->name('organizacao');

Route::get('/cupons', 'VisitanteController@cupons')->name('cupons');

Route::get('/oferta', 'VisitanteController@oferta')->name('oferta');

Route::get('/promocoes', 'VisitanteController@promocoes')->name('promocoes');
Route::post('/promocoes', 'VisitanteController@promocoesCat')->name('promocoesCat');
Route::get('/promocao/{promocao_id}', 'VisitanteController@promocao')->name('promocao');

Route::get('/parceiros', 'VisitanteController@parceiros')->name('parceiros');
Route::post('/parceiros', 'VisitanteController@parceirosCat')->name('parceirosCat');
Route::get('/parceiro/{parceiro_id}', 'VisitanteController@parceiro')->name('parceiro');


Route::post('/cupom', 'Cupom\CupomController@cupom')->name('cupom');
Route::get('/logarAssociado', 'VisitanteController@logarAssociado')->name('logarAssociado');


Route::prefix('/associado')->group(function () {
    Route::get('', 'Associado\AssociadoController@index')->name('associado');
    Route::post('/login', 'Associado\AssociadoLoginController@login')->name('ass_logar');
    Route::get('/registrar', 'Associado\AssociadoLoginController@registrar')->name('ass_registrar');
    Route::post('/registrarAction', 'Associado\AssociadoLoginController@registrar_action')->name('ass_registrar_action');
    Route::get('/sair', 'Associado\AssociadoLoginController@logout')->name('associado_logout');
    Route::post('/atualizar', 'Associado\AssociadoController@atualizar')->name('associado_atualizar');
});

Route::prefix('/parceiro')->group(function () {
  Route::get('/', 'Parceiro\ParceiroController@index')->name('parceiro');
  Route::post('/login', 'Parceiro\ParceiroLoginController@login')->name('parc_logar');
  Route::get('/registrar', 'Parceiro\ParceiroController@registro')->name('parc_registrar');
  Route::post('/registrar', 'Parceiro\ParceiroController@registrar')->name('parc_registrar_action');
  Route::get('/sair', 'Parceiro\ParceiroController@sair')->name('parc_logout');
  Route::post('/atualizar', 'Parceiro\ParceiroController@atualizar')->name('parc_atualizar');
});

Route::prefix('/sindicato')->group(function () {
  Route::get('/', 'SindicatoController@index')->name('index');
  Route::post('/login', 'SindicatoController@login')->name('sind_logar');
  Route::get('/registrar', 'SindicatoController@registro')->name('sind_registrar');
  Route::post('/registrar', 'SindicatoController@registrar')->name('sind_registrar_action');
  Route::get('/sair', 'SindicatoController@sair')->name('sind_logout');
  Route::post('/atualizar', 'SindicatoController@atualizar')->name('sind_atualizar');

});



/**
 * Admin Routes
 */
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function () {
  
  Route::resource('syndicates','SyndicatesController');
  
  
  // Route::get('/', 'AdminController@admin_login')->name('admin_login');
  // Route::post('/', 'AdminController@admin_login_action')->name('admin_login_action');
  // Route::get('/logout', 'AdminController@admin_logout')->name('admin_logout');


  // Route::group(['middleware' => [CheckAdminAuth::class]], function () {
  //   Route::get('/dash', 'AdminController@dashboard')->name('admin_dashboard');

  //   // Gerencia Administrador
  //   Route::get('/administradores', 'AdminController@administradores')->name('admin_adm_list');
  //   Route::get('/administrador/{id}', 'AdminController@administrador')->name('admin_adm_view');
  //   Route::get('/administrador/ativa/{id}', 'AdminController@activeOrDeactive')->name('admin_adm_active');

  //   Route::post('/administrador/submit', 'AdminController@updateOrCreate')->name('admin_adm_submit');

  //   // Gerencia Sindicatos
  //   Route::get('/sindicatos', 'AdminController@sindicatos')->name('admin_sin_list');
  //   Route::get('/sindicato/{id}', 'AdminController@sindicato')->name('admin_sin_view');
  //   Route::get('/sindicato/ativa/{id}', 'AdminController@sinActiveOrDeactive')->name('admin_sin_active');
  //   Route::get('/sindicato/aprova/{id}', 'AdminController@sinAprovarDesaprovar')->name('admin_sin_aprove');

  //   Route::post('/sindicato/submit', 'AdminController@sinUpdateOrCreate')->name('admin_sin_submit');
   
  //   // Categorias/Subcategorias Sindicatos
  //   Route::get('/sindicato/categoria/lista', 'AdminController@sinCategorias')->name('admin_sin_cat_list');
  //   Route::get('/sindicato/categoria/{id}', 'AdminController@sinCategoria')->name('admin_sin_cat_view');
  //   Route::post('/sindicato/categoria/submit', 'AdminController@sinCatUpdateOrCreate')->name('admin_sin_cat_submit');
  //   Route::get('/sindicato/categoria/delete/{id}', 'AdminController@sinCatDelete')->name('admin_sin_cat_delete');

  //   // Gerencia estabelecimentos Sindicatos
  //   Route::get('/sindicato/estabelecimento/lista', 'AdminController@sinEstabelecimentos')->name('admin_sin_est_list');
  //   Route::get('/sindicato/estabelecimento/{id}', 'AdminController@sinEstabelecimento')->name('admin_sin_est_view');
  //   Route::post('/sindicato/estabelecimento/submit', 'AdminController@sinEstUpdateOrCreate')->name('admin_sin_est_submit');


  //   // Gerencia Associados
  //   Route::get('/associados', 'AdminController@associados')->name('admin_ass_list');
  //   Route::get('/associado/{id}', 'AdminController@associado')->name('admin_ass_view');
  //   Route::get('/associado/ativa/{id}', 'AdminController@assActiveOrDeactive')->name('admin_ass_active');
  //   Route::get('/associado/aprova/{id}', 'AdminController@assAprovarDesaprovar')->name('admin_ass_aprove');

  //   Route::post('/associado/submit', 'AdminController@assUpdateOrCreate')->name('admin_ass_submit');

  //   // Gerencia parceiros
  //   Route::get('/parceiros', 'AdminController@parceiros')->name('admin_par_list');
  //   Route::get('/parceiro/{id}', 'AdminController@parceiro')->name('admin_par_view');
  //   Route::get('/parceiro/ativa/{id}', 'AdminController@parActiveOrDeactive')->name('admin_par_active');
  //   Route::get('/parceiro/aprova/{id}', 'AdminController@parAprovarDesaprovar')->name('admin_par_aprove');

  //   Route::post('/parceiro/submit', 'AdminController@parUpdateOrCreate')->name('admin_par_submit');
   
  //   // Categorias/Subcategorias parceiros
  //   Route::get('/parceiro/categoria/lista', 'AdminController@parCategorias')->name('admin_par_cat_list');
  //   Route::get('/parceiro/categoria/{id}', 'AdminController@parCategoria')->name('admin_par_cat_view');
  //   Route::post('/parceiro/categoria/submit', 'AdminController@parCatUpdateOrCreate')->name('admin_par_cat_submit');
   
  //   // Gerencia estabelecimentos parceiros
  //   Route::get('/parceiro/estabelecimento/lista', 'AdminController@parEstabelecimentos')->name('admin_par_est_list');
  //   Route::get('/parceiro/estabelecimento/{id}', 'AdminController@parEstabelecimento')->name('admin_par_est_view');
  //   Route::post('/parceiro/estabelecimento/submit', 'AdminController@parEstUpdateOrCreate')->name('admin_par_est_submit');
  //   Route::get('/parceiro/estabelecimento/ativa/{id}', 'AdminController@parEstActiveOrDeactive')->name('admin_par_est_active');


  //   // Gerencia Promoções
  //   Route::get('/promocoes', 'AdminController@promocoes')->name('admin_pro_list');
  //   Route::get('/promocao/{id}', 'AdminController@promocao')->name('admin_pro_view');
  //   Route::get('/promocao/ativa/{id}', 'AdminController@proActiveOrDeactive')->name('admin_pro_active');
  //   Route::get('/promocao/aprova/{id}', 'AdminController@proAprovarDesaprovar')->name('admin_pro_aprove');

  //   Route::post('/promocao/submit', 'AdminController@proUpdateOrCreate')->name('admin_pro_submit');
   
  //   // Categorias/Subcategorias Promoções
  //   Route::get('/promocao/categoria/lista', 'AdminController@proCategorias')->name('admin_pro_cat_list');
  //   Route::get('/promocao/categoria/{id}', 'AdminController@proCategoria')->name('admin_pro_cat_view');
  //   Route::post('/promocao/categoria/submit', 'AdminController@proCatUpdateOrCreate')->name('admin_pro_cat_submit');

  //   // Gerencia Cupons
  //   Route::get('/cupons', 'AdminController@cupons')->name('admin_cup_list');
  //   Route::get('/cupom/ativa/{id}', 'AdminController@cupActiveOrDeactive')->name('admin_cup_active');
  //   Route::get('/cupom/usar/{id}', 'AdminController@cupUsar')->name('admin_cup_use');
  // });
});


