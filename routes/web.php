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
    Route::get('create',['as' => 'admin.create', 'uses' => 'AdminController@create']);
    Route::get('show/{id}',['as' => 'admin.show', 'uses' => 'AdminController@show']);
    Route::post('create', ['as' => 'admin.store', 'uses' => 'AdminController@store']);
    Route::get('/all', ['as' => 'admin.index', 'uses' => 'AdminController@index']);
    Route::get('destroy/{id?}', ['as' => 'admin.destroy', 'uses' => 'AdminController@destroy']);
    Route::get('edit/{id}', ['as' => 'admin.edit', 'uses' => 'AdminController@edit']);
    Route::put('update/{id}', ['as' => 'admin.update', 'uses' => 'AdminController@update']);
//    Route::get('/active/{id}', 'adminController@active');
//    Route::get('/changepassword/', 'adminController@changepassword');
//    Route::post('/changepassword/', 'adminController@postChangepassword');
//    Route::get('/profile/', 'adminController@profile');
//    Route::post('/profile/', 'adminController@updateprofile');
});
Route::get('/language/{lang?}', [
    'as' => 'language.change',
    'uses' => 'LocalizationController@change'
]);
Route::group(['prefix' => 'expert'], function () {
    Route::get('create',['as' => 'expert.create', 'uses' => 'ExpertController@create']);
    Route::get('show/{id}',['as' => 'expert.show', 'uses' => 'ExpertController@show']);
    Route::post('create', ['as' => 'expert.store', 'uses' => 'ExpertController@store']);
    Route::get('/all', ['as' => 'expert.index', 'uses' => 'ExpertController@index']);
    Route::get('destroy/{id?}', ['as' => 'expert.destroy', 'uses' => 'ExpertController@destroy']);
    Route::get('edit/{id}', ['as' => 'expert.edit', 'uses' => 'ExpertController@edit']);
    Route::put('update/{id}', ['as' => 'expert.update', 'uses' => 'ExpertController@update']);
//    Route::get('/active/{id}', 'ExpertController@active');
//    Route::get('/changepassword/', 'ExpertController@changepassword');
//    Route::post('/changepassword/', 'ExpertController@postChangepassword');
//    Route::get('/profile/', 'ExpertController@profile');
//    Route::post('/profile/', 'ExpertController@updateprofile');
});
Route::group(['prefix' => 'user'], function () {
    Route::get('create',['as' => 'user.create', 'uses' => 'UserController@create']);
    Route::get('show/{id}',['as' => 'user.show', 'uses' => 'UserController@show']);
    Route::post('create', ['as' => 'user.store', 'uses' => 'UserController@store']);
    Route::get('/all', ['as' => 'user.index', 'uses' => 'UserController@index']);
    Route::get('destroy/{id?}', ['as' => 'user.destroy', 'uses' => 'UserController@destroy']);
    Route::get('edit/{id}', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
    Route::put('update/{id}', ['as' => 'user.update', 'uses' => 'UserController@update']);
//    Route::get('/active/{id}', 'UserController@active');
//    Route::get('/changepassword/', 'UserController@changepassword');
//    Route::post('/changepassword/', 'UserController@postChangepassword');
//    Route::get('/profile/', 'UserController@profile');
//    Route::post('/profile/', 'UserController@updateprofile');
});