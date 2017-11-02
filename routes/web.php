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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/','indexController@index');
Route::get('/riding','ridingController@riding');
Route::get('/stable','stableController@stable');
Route::get('/team','horseController@horse');
Route::get('/contact','contactController@contact');
Route::get('/admin','adminController@admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
