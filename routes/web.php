<?php

use App\org;
  use Illuminate\Http\Request;
  use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

  Route::get('/', function(){
    return view('welcome');
  });
Route::get('/payment', 'PayController@index');
Route::post('/payment', 'TransController@trans');
Route::post('/moneyfill', 'TransController@trans');
Route::get('/moneyfill', 'MoneyfillController@index');
Route::get('/purse', 'PurseCreateController@index');
Route::post('/purse', 'PurseCreateController@create');
Route::post('/fill', 'PurseController@fill');
Route::get('/fill', 'PurseController@index');
Route::get('/orgs', 'OrgsController@index');
Route::post('/org', 'OrgsController@add');
Route::get('/client', 'ClientController@index');
Route::delete('/orgs/{id}', 'OrgsController@delete');
Route::put('/orgs/{id}', 'OrgsController@edit');
Route::get('orgs/{id}/edit', 'OrgsController@get');
// Route::get('/home', 'HomeController@index');
Route::get('home/{id?}', 'HomeController@index');
Auth::routes();
