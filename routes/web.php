<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
//    Route::get('/changepassword/', 'adminController@changepassword');
//    Route::post('/changepassword/', 'adminController@postChangepassword');
      Route::get('/profile/',['as'=>'admin.profile','uses'=> 'AdminController@profile']);
      Route::post('/profile/',['as'=>'admin.updateprofile','uses'=> 'AdminController@updateprofile']);
});
Route::get('/language/{lang?}', [
    'as' => 'language.change',
    'uses' => 'LocalizationController@change'
]);
Route::group(['prefix' => 'person'], function () {
    Route::get('create',['as' => 'person.create', 'uses' => 'PersonController@create']);
    Route::get('show/{id}',['as' => 'person.show', 'uses' => 'PersonController@show']);
    Route::post('create', ['as' => 'person.store', 'uses' => 'PersonController@store']);
    Route::get('/all', ['as' => 'person.index', 'uses' => 'PersonController@index']);
    Route::get('/req', ['as' => 'person.reqExp', 'uses' => 'PersonController@reqExp']);
    Route::get('block/{id?}', ['as' => 'person.block', 'uses' => 'PersonController@block']);
    Route::get('accept/{id}', ['as' => 'person.accept', 'uses' => 'PersonController@accept']);
        Route::get('reject/{id?}', ['as' => 'person.reject', 'uses' => 'PersonController@reject']);
//    Route::get('/active/{id}', 'UserController@active');
//    Route::get('/changepassword/', 'UserController@changepassword');
//    Route::post('/changepassword/', 'UserController@postChangepassword');
//    Route::get('/profile/', 'UserController@profile');
//    Route::post('/profile/', 'UserController@updateprofile');
});

    Route::get('/',['as' => 'logout', 'uses' => 'Controller@logout']);