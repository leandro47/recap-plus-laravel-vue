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
    Route::get('/list-client', 'ClientController@list')->name('list-client');
});
