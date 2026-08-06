<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PerusahaanController;
Route::resource('siswa', SiswaController::class);
Route::resource('perusahaan', PerusahaanController::class);


Route::get('/', function () {
    return view('welcome');
});
    