<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

/**
 * Site Routes
 */
Route::group(['namespace' => 'Site'], function () {
  Route::get('/', 'SiteController@index')->name('site.index');

  Route::get('promocoes/resgatar/{id}', 'SiteController@showPromotion')->name('promotions.redeem');
  Route::get('promocoes', 'SiteController@promotions')->name('site.promotions');

  Route::get('parceiros/{id}', 'SiteController@showPartner')->name('site.partner');
  Route::get('parceiros', 'SiteController@partners')->name('site.partners');

  Route::get('sindicatos/{id}', 'SiteController@showSyndicate')->name('site.syndicate');
  Route::get('sindicatos', 'SiteController@syndicates')->name('site.syndicates');

  Route::get('associado/cadastro', 'SiteController@AffiliateRegister')->name('affiliates.register');
  Route::get('parceiro/cadastro', 'SiteController@PartnerRegister')->name('partners.register');
  Route::get('sindicato/cadastro', 'SiteController@SyndicateRegister')->name('syndicates.register');

  Route::post('associado', 'SiteController@storeAffiliate')->name('store.affiliates');
  Route::post('parceiro', 'SiteController@storePartner')->name('store.partners');
  Route::post('sindicato', 'SiteController@storeSyndicate')->name('store.syndicates');

  Route::view('politica-de-privacidade', 'site.pages.politica-privacidade')->name("page.politica");
  Route::view('termos-de-uso', 'site.pages.termos-de-uso')->name('page.termos-de-uso');
  Route::view('sobre', 'site.pages.sobre')->name('page.sobre');
  Route::view('perguntas-frequentes', 'site.pages.faq')->name('page.faq');
  Route::view('contato', 'site.pages.contato')->name('page.contato');

  Route::view('planos', 'site.pages.home.prices')->name('site.prices');
  Route::view('oferta', 'site.pages.home.oferta');
});


/**
 * Affiliates Auth Routes
 */

Route::group(['namespace' => 'Affiliates', 'prefix' => 'associado'], function () {
  Route::get('/', function () {
    return view('site.pages.affiliate.affiliate');
  })->name('affiliates.dashboard');
});



/**
 * Admin Routes
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin',  'middleware' => ['auth']], function () {

  /**
   * Dashboard Routes
   */
  Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');


  //Syndicates
  Route::resource('syndicates', 'SyndicatesController');
  //Categories
  Route::resource('categories', 'CategoriesController');
  //Partners
  Route::resource('partners', 'PartnersController');
  //Stores
  Route::resource('stores', 'StoresController');
  //Affiliates
  Route::resource('affiliates', 'AffiliatesController');

  //Users
  Route::resource('users', 'UsersController');

  Route::get('promotions/generate-code', 'PromotionsController@generateCode')->name('promotion.generate-code');
  Route::resource('promotions', 'PromotionsController');
});
