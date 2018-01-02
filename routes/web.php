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
    return view('welcome');
});



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


route::group(['middleware'=>['web','auth','admin']],function(){


    Route::resource('admin/panal','UsersController');
    Route::get('user/non_admin/{id}','UsersController@remove_admin');
    Route::get('user/admin/{id}','UsersController@make_admin');
    Route::get('admin/logout','UsersController@admin_logout');

});

//users
route::group(['middleware'=>['web','auth']],function(){

    Route::resource('users','UsersController');
    Route::get('users/{id}/destroy','UsersController@destroy');
    Route::resource('profile','ProfileController');

});

//profile




