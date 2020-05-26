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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


//Route::resource('competidores', 'CompetidoresController');
// Route::get('competidores/{id}', function($id) {
//     return Competidor::find($id);
// });

// Route::get('competidores', function() {
//     return Competidor::all();
// });
// Route::get('competidores', 'CompetidoresController@index');
// Route::get('competidores/{competidor}', 'CompetidoresController@show');
// Route::post('competidores', 'CompetidoresController@store');
// Route::put('competidores/{competidor}', 'CompetidoresController@update');
// Route::delete('competidores/{competidor}', 'CompetidoresController@delete');

//Route::apiResource('competidores', 'CompetidoresController')->only(['store'])->parameters(['competidores' => 'competidor']);
// Route::post('register', 'Api\RegisterController@register');
// Route::post('login', 'Api\RegisterController@login');
// Route::middleware('auth:api')->group( function () {
//     Route::post('competidores', 'CompetidoresController@store');
// });
//Route::get('competidores', 'CompetidoresController@store')->name('competidores')->middleware('apicustom');
Route::get('competidores', 'CompetidoresController@store')->name('competidores');
