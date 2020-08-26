<?php

use App\Exports\CompetidoresExport;
use Maatwebsite\Excel\Facades\Excel;
//use Illuminate\Support\Facades\Auth;
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
    if(Auth::check()){
        return redirect()->route('home');
    } else {
        return view('auth.login');
    }
})->name('login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('registros', 'HomeController@registros')->name('registros');
Route::get('competidor/{competidor}', 'HomeController@edit')->name('competidor');
Route::put('competidor/{competidor}', 'HomeController@update')->name('competidor.update');
Route::get('categorias/{id_genero}/{id_distancia}', 'HomeController@categorias')->name('categorias');
Route::get('corral/{id_categoria}/{vip}', 'HomeController@corral')->name('corral');
Route::get('correo/{competidor}', 'HomeController@EnviarCorreo')->name('correo');
Route::get('correos/{ids}', 'HomeController@EnviarCorreos')->name('correos');

Route::get('formulario/{competidor}', 'CompetidoresController@edit')->name('formulario');
Route::put('formulario/{competidor}', 'CompetidoresController@update')->name('formulario.update');

Route::get('excel', function () {
    return Excel::download(new CompetidoresExport, 'competidores.xlsx');
})->name('excel');

//ruta de graficas
Route::get('graficas', 'ChartController@index')->name('chart.index');

//Descargar pdf
Route::get('pdfDownload/{fecha}', 'HomeController@pdfDownload')->name('pdfDownload');
