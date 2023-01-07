<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

# Demo routes
Route::group(['prefix' => 'demo'], function () {

    Route::get('index', [App\Http\Controllers\DemounoController::class, 'index'])->name('demo-index');

    Route::get('sucursales', [App\Http\Controllers\DemounoController::class, 'sucursales'])->name('demo-sucursales');

    Route::get('pacientes', [App\Http\Controllers\DemounoController::class, 'pacientes'])->name('demo-pacientes');

    Route::get('expediente', [App\Http\Controllers\DemounoController::class, 'expediente'])->name('demo-expediente');

    Route::get('ver-imagenes/{paciente_id}', [App\Http\Controllers\DemounoController::class, 'verImagenes'])->name('demo-ver-imagenes');

});
