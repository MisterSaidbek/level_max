<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('App\Http\Controllers')->group(function () {

    Route::match(['get','post'],'/admin','AdminController@login');

    Route::group(['middleware' => ['auth']],function(){
        Route::get('/admin/dashboard', 'AdminController@dashboard');
        Route::get('/admin/settings', 'AdminController@settings');
        Route::get('/admin/check-pwd','AdminController@chkPassword');
        Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');


        Route::get('/logout', 'AdminController@logout');
//Auth::routes();




    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
