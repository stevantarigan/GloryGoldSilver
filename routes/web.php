<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/emas', function () {
    return view('katalog-emas');
})->name('katalog.emas');
Route::get('/perak', function () {
    return view('katalog-perak');
})->name('katalog.perak');

