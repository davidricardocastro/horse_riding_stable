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

//Route::get('/home','indexController@index');
//Route::get('/logout','indexController@index');

Route::get('/ratsastus','ridingController@riding');
Route::get('/talli','stableController@stable');
Route::get('/hevoset','horseController@horse');
Route::get('/yhteystiedot','contactController@contact');
Route::get('/user','userController@user')->middleware('auth');

Auth::routes();



//for storing contacts to db
Route::post('/contact', 'contactController@store');



//show detail of slot
Route::get('/slots/slot/{id}', 'slotController@show')->name('slot detail');

//new slot
Route::get('/slot/new', 'slotController@create');
Route::post('/slot/new', 'slotController@store');

//edit slot
Route::get('/slot/edit/{id}', 'slotController@edit');
Route::post('/slot/edit/{id}', 'slotController@store');

//list all slots
Route::get('/slot/list', 'slotController@listing');

//delete slot
Route::post('/slots/slot/{id}', 'slotController@destroy');

//view all slots in a day
Route::get('/slots/day/{lesson_start}', 'DaySlotController@show');


//select day to show slots
Route::get('/slots/day', 'DaySlotController@index');
Route::post('/slots/day/', 'DaySlotController@test'); //test method 


//view all slots in a week
Route::get('/slots/week/{lesson_start}', 'WeekSlotController@show');
//week selecter
Route::get('/slots/week', 'WeekSlotController@index');



//user_data to view/edit
Route::get('/user_data', 'userController@user_data');
//user_data to store
//Route::post('/user_data', 'userController@change_user_data');
//delete reservation
Route::post('/user_data/cancel/{id}', 'userController@cancel_reservation');
//edit user
Route::post('/user_data/{user}','userController@store');


