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



Route::group(['middleware'=>'auth'],function (){

    Route::get('', function () {

        session(['a'=>'webshop']);
        //echo session('a');
        return view('welcome',['a'=>session('a')]);
    });
    Route::get('home',function(){

        return view('welcome');

    });

});




//Create Auth

Route::get('login',function (){
    return view('auth.login');
})->name('login');
Route::post('login','Auth\LoginController@login');

Route::get('logout','Auth\LoginController@logout');



