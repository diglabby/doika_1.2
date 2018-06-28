<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

///////////////////////////////////////////////////////////////////////////////
// наладочные маршруты
//Route::get('/doika/list', 'DevController@getListPage');
//Route::get('/doika/campaign', 'DevController@getCampaignPage');
//Route::get('/doika/configuration', 'DevController@getConfigurationPage');
////////////////////////////////////////////////////////////////////////////////


Route::group(['middleware' => 'auth'], function () {
// routes Campaigns
Route::get('/doika/create', 'DevController@getCreatePage');
Route::post('/doika/create', 'CampaignAdminController@create');
Route::get('/doika/show-campaign-{id}', 'CampaignAdminController@show')->where('id', '[0-9]+');
Route::post('/doika/update-campaign-{id}', 'CampaignAdminController@update')->where('id', '[0-9]+');
Route::get('/doika/delete-campaign-{id}', 'CampaignAdminController@delete')->where('id', '[0-9]+');
Route::get('/doika/show-list', 'CampaignAdminController@showList');
Route::get('/doika/show-list-{id}','CampaignAdminController@showListConditions')->where('id', '[0-9]+');
Route::get('/doika/get-out', 'CampaignAdminController@getOut');

// routes Configurations
Route::get('/doika/show-configurations', 'ConfigurationAdminController@showConfigurations');
Route::post('/doika/save-configurations', 'ConfigurationAdminController@saveConfigurations');
Route::post('/doika/save-login', 'ConfigurationAdminController@changePassword');




Route::get('/doika', 'CampaignAdminController@showList');

});


Route::get('/doika/client-{id}', 'CampaignClientController@getCampaignClient')->where('id', '[0-9]+');
Route::get('/doika/donate-{id}', 'DonateController@donate')->where('id', '[0-9]+');
Route::post('/doika/payment-record-db-{id}', 'DonateController@recordPayment')->where('id', '[0-9]+');
Route::get('/doika/payment-record-db-{id}', 'DonateController@recordPayment')->where('id', '[0-9]+');


Auth::routes();

Route::get('doika/home', 'HomeController@index')->name('home');
