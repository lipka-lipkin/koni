<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');

Route::group(['middleware' => 'auth:api'], function (){

    Route::get('horses', 'HorseController@index');
    Route::post('horses', 'HorseController@store');
    Route::get('horses/{horse}', 'HorseController@show');
    Route::put('horses/{horse}', 'HorseController@update');
    Route::delete('horses/{horse}', 'HorseController@destroy');

});
