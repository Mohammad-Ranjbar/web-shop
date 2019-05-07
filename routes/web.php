<?php
Route::group(['middleware'=>'auth'],function (){

    Route::get('/', function () {
        session(['a'=>'webshop']);
        //echo session('a');
        return view('welcome',['a'=>session('a')]);
    });
    Route::get('/home',function(){
        return view('welcome');
    });


});



Route::get('/login',function (){
    return view('auth.login');
});

Route::post('login','Auth\LoginController@login');

Route::get('logout','Auth\LoginController@logout');



