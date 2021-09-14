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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
})->name('user');

Route::middleware('auth:sanctum')->get('/athenticated', function () {
    return true;
})->name('athenticated');

Route::post('register', 'UserController@register')->name('register');
Route::post('login', 'UserController@login')->name('login');
Route::post('logout', 'UserController@logout')->name('logout');

Route::middleware('auth:sanctum')->group(function () {
    // State
    Route::get('/list-state', 'StateController@list')->name('list-state');

    // City
    Route::get('/list-city/{id}', 'CityController@list')->name('list-city');
    Route::get('/show-city/{id}', 'CityController@show')->name('show-city');

    // Client
    Route::get('/list-client', 'ClientController@list')->name('list-client');
    Route::get('/edit-client/{uuid}', 'ClientController@show')->name('edit-client');
    Route::post('/store-client', 'ClientController@store')->name('store-client');
    Route::delete('/delete-client/{uuid}', 'ClientController@destroy')->name('delete-client');
    Route::put('/update-client/{uuid}', 'ClientController@update')->name('update-client');

    // Client
    Route::get('/list-formpayment', 'FormPaymentController@list')->name('list-formpayment');
    Route::get('/edit-formpayment/{uuid}', 'FormPaymentController@show')->name('edit-formpayment');
    Route::post('/store-formpayment', 'FormPaymentController@store')->name('store-formpayment');
    Route::delete('/delete-formpayment/{uuid}', 'FormPaymentController@destroy')->name('delete-formpayment');
    Route::put('/update-formpayment/{uuid}', 'FormPaymentController@update')->name('update-formpayment');
});
