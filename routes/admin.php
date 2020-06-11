<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:api'], function (){

    Route::get('horses', 'HorseController@index');
    Route::post('horses', 'HorseController@store');
    Route::get('horses/{horse}', 'HorseController@show');
    Route::put('horses/{horse}', 'HorseController@update');
    Route::delete('horses/{horse}', 'HorseController@destroy');

});
