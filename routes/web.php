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
    return view('pages.home');
});

Route::resource('/home','home');

Route::resource('/userscv','userscv');

Route::resource('/profile','profile');

Route::resource('/editeprofile','editeprofile');

Route::resource('/contact','contact');

Route::resource('/register','register');

Route::get('/adddomin',[
    'uses'=>'register@adddomin',
    'as' => 'register.adddomin'
]);

