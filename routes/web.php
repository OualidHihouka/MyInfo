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

Route::get('/', function () {
    return view('index');
});

Route::get('/home','PagesController@home');

Route::get('/userscv','PagesController@userscv');

Route::get('/profile','PagesController@profile');

Route::get('/editeprofile','PagesController@editeprofile');

Route::get('/contact','PagesController@contact');