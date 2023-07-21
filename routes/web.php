<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/provinsi', \App\Http\Controllers\ProvinsiController::class);
Route::resource('/kabupaten', \App\Http\Controllers\KabupatenController::class);

// Route::get('/kabupaten/cetak', \App\Http\Controllers\KabupatenController::class, 'cetak')->name('kabupaten.cetak');
// Route::get('/kabupaten/cetak', [\App\Http\Controllers\KabupatenController::class, 'cetak'])->name('kabupaten.cetak');