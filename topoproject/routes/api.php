<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::get('users', 'App\Http\Controllers\Admin\UsersController@index');
Route::get('groupes', 'App\Http\Controllers\Admin\GroupesController@index');
Route::put('uupdate','App\Http\Controllers\Admin\UsersController@uupdate');
Route::put('gupdate', 'App\Http\Controllers\Admin\GroupesController@gupdate');
Route::delete('deleteuser/{id}','App\Http\Controllers\Admin\UsersController@delete');
Route::get('getuser/{id}','App\Http\Controllers\Admin\UsersController@getuserbyid');
Route::delete('deletegroupe/{id}','App\Http\Controllers\Admin\GroupesController@delete');
Route::get('getgroupe/{id}','App\Http\Controllers\Admin\GroupesController@getgrbyid');
Route::post('addgroupe','App\Http\Controllers\Admin\GroupesController@insert');
Route::post('addgroupeuser','App\Http\Controllers\Admin\GroupesController@adduser');

