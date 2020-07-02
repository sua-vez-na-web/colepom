<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['login','logout']);

/**
 * Site Routes
 */
Route::group(['namespace'=>'Site'],function(){
    Route::get('/', 'SiteController@index')->name('site.index');

    Route::get('promocoes/{id}','SiteController@showPromotion')->name('site.promotions');
    Route::get('promocoes','SiteController@promotions')->name('site.promotions');
    
    Route::get('parceiros/{id}','SiteController@showPartner')->name('site.partner');
    Route::get('parceiros','SiteController@partners')->name('site.partners');

    Route::get('sindicatos/{id}','SiteController@showSyndicate')->name('site.syndicate');    
    Route::get('sindicatos','SiteController@syndicates')->name('site.syndicates');    
});



/**
 * Admin Routes
 */
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function () {

  /**
   * Dashboard Routes
   */
  Route::get('/dashboard','DashboardController@index')->name('dashboard.index');


  /**
   * Syndicats Routes
   */
  Route::resource('syndicates','SyndicatesController');

  /**
   * Categories Routes
   */
  Route::resource('categories','CategoriesController');

  /**
   * Partners Routes
   */
  Route::resource('partners','PartnersController');

  /**
   * Stores Routes
   */
  Route::resource('stores','StoresController');

  /**
   * Affiliates Routes
   */
  Route::resource('affiliates','AffiliatesController')->only(['index','show']);

  /**
   * Promotions Routes
   */
  Route::resource('promotions','PromotionsController');
});


