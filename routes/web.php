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


Route::get('/calendar', [App\Http\Controllers\PetController::class, 'index']);
Route::post('/pets', [App\Http\Controllers\PetController::class, 'store'])->name('pets.store');
Route::post('/pets/edit/{id}', [App\Http\Controllers\PetController::class, 'edit'])->name('pets.edit');
Route::delete('/pets/{id}', [App\Http\Controllers\PetController::class, 'destroy'])->name('pets.destroy');

Route::get('/appointment', [App\Http\Controllers\AppointmentController::class, 'index']);
Route::post('/appointment', [App\Http\Controllers\AppointmentController::class, 'store'])->name('appointment.store');
