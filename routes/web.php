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
Route::get('/riding','ridingController@riding');
Route::get('/team','teamController@team');
Route::get('/contact','contactController@contact');
Route::get('/admin','adminController@admin');




//THIS COULD BE DELETED BUT CONTAINS A LOGIN EXAMPLE LET IT LIVE UNTIL WE FINISH THE CONTACT FORM
Route::get('/test','testController@index');
Route::get('/test/create','testController@create');//this creates a element in DB