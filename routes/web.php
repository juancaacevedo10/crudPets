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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/calendar', [App\Http\Controllers\AppointmentController::class, 'index']);
Route::get('/calendar/agregar', [App\Http\Controllers\AppointmentController::class, 'store']);


Route::get('/pets', [App\Http\Controllers\PetController::class, 'index']);
Route::post('/pets', [App\Http\Controllers\PetController::class, 'store'])->name('pets.store');
Route::delete('/pets', [App\Http\Controllers\PetController::class, 'destroy']);