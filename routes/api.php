<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();


});



Route::post('reservation/save', 'Api\ReservationController@create_reservation');
Route::get('reservation/date', 'Api\ReservationController@display_reservation');
Route::get('reservation', 'Api\ReservationController@week');

