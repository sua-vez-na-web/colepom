<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

/**
 * Site Routes
 */
Route::group(['namespace' => 'Site'], function () {
    Route::get('/', 'SiteController@index')->name('site.index');

    Route::get('promocoes/{id}', 'SiteController@showPromotion')->name('promotions.redeem');
    Route::get('coupon/{promotion}/redeem', 'SiteController@redeemCoupon')->name('coupon.redeem');

    Route::get('promocoes', 'SiteController@promotions')->name('site.promotions');
    Route::get('busca-promocoes', 'SiteController@promotionSearch')->name('promotions.search');

    Route::get('parceiros/{id}', 'SiteController@showPartner')->name('site.partner');
    Route::get('parceiros', 'SiteController@partners')->name('site.partners');
    Route::get('busca-parceiros', 'SiteController@partersSearch')->name('partners.search');

    #sindicatos
    Route::get('sindicatos/{id}', 'SiteController@showSyndicate')->name('site.syndicate');
    Route::get('sindicatos', 'SiteController@syndicates')->name('site.syndicates');
    Route::get('busca-sindicatos', 'SiteController@syndicateSearch')->name('syndicates.search');
    Route::get('escolha-um-plano/{syndicate_id}', 'SiteController@plansSelect')->name('plans.select');
    Route::post('sindicato/gerar-boleto', 'SiteController@syndicateSubscribe')->name('syndicate.subscribe');


    Route::view('seja-parceiro', 'site.pages.partners.be_partner')->name('site.be-partner');
    Route::view('quero-ser-um-affiliado', 'site.pages.affiliate.be_affiliate')->name('site.be-affiliate');
    Route::view('cadastro-sindicato', 'site.pages.syndicates.be_syndicate')->name('site.be-syndicate');

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
    Route::post('contato', 'SiteController@contact')->name('contact.store');

    //Route::view('planos', 'site.pages.home.prices')->name('site.prices');
    Route::view('oferta', 'site.pages.home.oferta');

    Route::get('/ajaxCidades', 'AjaxController@ajaxCidades');
});


/**
 * Affiliates Auth Routes
 */

Route::group(['namespace' => 'Site', 'prefix' => 'associado/minha-conta'], function () {
    Route::get('/', function () {
        return view('site.pages.affiliate.affiliate');
    })->name('affiliates.dashboard');

    Route::get('/cupons', 'SiteController@affiliatesCupons')->name('affiliates.coupons');


    Route::get('/meus-dados', 'SiteController@affiliatesGetProfile')->name('affiliates.profile');
    Route::post('/meus-dados', 'SiteController@affiliatesUpdateProfile')->name('affiliates.update-profile');
});


/**
 * Admin Routes
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

    /**
     * Dashboard Routes
     */
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');


    //Syndicates
    Route::resource('syndicates', 'SyndicatesController');
    Route::get('syndicates/{id}/aproove', 'SyndicatesController@aproove')->name('syndicates.aproove');

    //Categories
    Route::resource('categories', 'CategoriesController');

    //Partners
    Route::resource('partners', 'PartnersController');
    Route::get('partners/{id}/aproove', 'PartnersController@aproove')->name('partners.aproove');

    //Stores
    Route::resource('stores', 'StoresController');

    //Affiliates
    Route::resource('affiliates', 'AffiliatesController');
    Route::get('affiliates/{id}/aproove', 'AffiliatesController@aproove')->name('affiliates.aproove');

    //Users
    Route::resource('users', 'UsersController');

    //Promotions
    Route::get('promotions/generate-code', 'PromotionsController@generateCode')->name('promotion.generate-code');
    Route::resource('promotions', 'PromotionsController');
    Route::get('promotions/{id}/aproove', 'PromotionsController@aproove')->name('promotions.aproove');

    //Cupons
    Route::resource('coupons', 'CouponsController');
    Route::get('coupons/{id}/aproove', 'CouponsController@aproove')->name('coupons.aproove');
    Route::get('coupons/{id}/edit', 'CouponsController@edit')->name('coupons.edit');
    Route::get('coupons/create', 'CouponsController@create')->name('coupons.create');

    Route::put('coupons/edit/{id}', 'CouponsController@update')->name('coupons.update');

    Route::post('coupons/store', 'CouponsController@store')->name('coupons.store');
    //AfiliatesCoupons
    Route::get('affiliates-coupons', 'AffiliatesCouponsController@index')->name('affiliates-coupons.index');
    Route::get('affiliates-coupons/{id}', 'AffiliatesCouponsController@show')->name('affiliates-coupons.show');
    Route::get('affiliates-coupons/{id}/comfirm', 'AffiliatesCouponsController@confirm')->name('affiliates-coupons.confirm');

    //Subscriptions
    Route::resource('subscriptions', 'SubscriptionsController');

    //Plans
    Route::resource('plans', 'PlansController');

    //Profile
    Route::get('profile', 'ProfileController@edit')->name('profile.edit');
    Route::post('profile', 'ProfileController@update')->name('profile.update');
    Route::post('profile/update-password', 'ProfileController@updatePassword')->name('profile.update-password');
});
