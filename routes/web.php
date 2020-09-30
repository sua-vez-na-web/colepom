<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['login', 'logout']);

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

  Route::get('/associado/cadastro', 'SiteController@showRegistrationForm')->name('affiliates.register');
  Route::post('/associado', 'SiteController@registerAffiliate')->name('register.affiliates');
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
