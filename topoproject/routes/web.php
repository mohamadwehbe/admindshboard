<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('home');
});
Route::get('/admin/users', function () {
   // dd(Auth::user());
    return view('home');
});
Route::get('/admin/groupes', function () {
    // dd(Auth::groupe());
    return view('home');
});
//Route::get('/admin/usersupdate', function () {
//    return view('home');
//});
Route::get('/admin/addgroupe', function () {
    return view('home');
});
Route::get('/admin/addgroupeuser/{any}', function () {
    return view('home');
});
Route::get('/admin/usersupdate/{any}', function () {
    return view('home');
});
Route::get('/admin/groupesupdate/{any}', function () {
    return view('home');
});
Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->group(function (){
  //  Route::resource('users', 'UsersController',['except'=>['show','create','store']]);
//});
