<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/emas', function () {
    return view('katalog-emas');
})->name('katalog.emas');
Route::get('/perak', function () {
    return view('katalog-perak');
})->name('katalog.perak');



Route::get('/katalog/emas', [ProductController::class, 'emas'])->name('katalog.emas');
Route::get('/katalog/perak', [ProductController::class, 'perak'])->name('katalog.perak');