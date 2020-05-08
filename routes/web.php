<?php

use Illuminate\Support\Facades\Route;


Route::get('/home', function(){
    return view('Home');
});
//Registracia
Route::get('/register', 'UserController@register');
Route::post('/sent_register_data', 'UserController@sent_register_data');
//End Registracia
//Login
Route::get('/login', 'UserController@show_login');
Route::post('/user_login', "UserController@login");
//Login end

