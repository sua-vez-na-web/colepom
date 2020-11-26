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

  Route::get('politica-de-privacidade', 'SiteController@policy');
  Route::get('termos-de-uso', 'SiteController@terms');
  Route::get('sobre', 'SiteController@about');
  Route::get('perguntas-frequentes', 'SiteController@faq');
  Route::get('contato', 'SiteController@contact')->name('site.contact');

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
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

  /**
   * Dashboard Routes
   */
  Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');


  /**
   * Syndicats Routes
   */
  Route::resource('syndicates', 'SyndicatesController');

  /**
   * Categories Routes
   */
  Route::resource('categories', 'CategoriesController');

  /**
   * Partners Routes
   */
  Route::resource('partners', 'PartnersController');

  /**
   * Stores Routes
   */
  Route::resource('stores', 'StoresController');

  /**
   * Affiliates Routes
   */
  Route::resource('affiliates', 'AffiliatesController');

  /**
   * Promotions Routes
   */
  Route::get('promotions/generate-code', 'PromotionsController@generateCode')->name('promotion.generate-code');
  Route::resource('promotions', 'PromotionsController');
});
