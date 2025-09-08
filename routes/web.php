<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// katalog emas → ambil dari controller
Route::get('/emas', [ProductController::class, 'emas'])->name('katalog.emas');

// katalog perak → ambil dari controller
Route::get('/perak', [ProductController::class, 'perak'])->name('katalog.perak');
