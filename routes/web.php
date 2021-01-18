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

Route::resource('/infocvcontroller','infocvcontroller');

//Route::resource('/login','login');

Route::get('/adddomin',[
    'uses'=>'register@adddomin',
    'as' => 'register.adddomin'
]);

Route::get('/login',[
    'uses'=>'login@index',
    'as' => 'login.index'
]);

Route::post('/login',[
    'uses'=>'login@auth',
    'as' => 'login.auth'
]);

Route::post('/editeprofile/{id}',[
    'uses'=>'editeprofile@update',
    'as' => 'editeprofile.update'
]);


Route::get('/editeprofile/{id1}/infocvcontroller/destroy/{id}','infocvcontroller@destroy');

Route::post('/infocvcontroller/update/{id}','infocvcontroller@update');


Route::get('/logout',[
    'uses'=>'login@logout',
    'as' => 'login.logout'
]);

// Route::post('/userscv/show/','userscv@show');

// Route::post('/userscv/show',[
//     'uses'=>'userscv@show',
//     'as' => 'userscv.show'
// ]);


//2480*3508



