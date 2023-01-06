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

# Sites routes
Route::group(['prefix' => 'demo'], function () {

    Route::get('index', [App\Http\Controllers\DemounoController::class, 'index'])->name('demo-index');

    Route::get('pacientes', [App\Http\Controllers\DemounoController::class, 'pacientes'])->name('demo-pacientes');

    Route::get('imagenes', [App\Http\Controllers\DemounoController::class, 'imagenes'])->name('demo-imagenes');

    Route::get('ver-imagenes/{paciente_id}', [App\Http\Controllers\DemounoController::class, 'verImagenes'])->name('demo-ver-imagenes');

});
