<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/artikel', [ArticleController::class, 'index'])->name('artikel.index');

Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('artikel.show');

Route::get('/katalog/emas', [ProductController::class, 'emas'])->name('katalog.emas');
Route::get('/katalog/perak', [ProductController::class, 'perak'])->name('katalog.perak');


// katalog emas → ambil dari controller
Route::get('/emas', [ProductController::class, 'emas'])->name('katalog.emas');

// katalog perak → ambil dari controller
Route::get('/perak', [ProductController::class, 'perak'])->name('katalog.perak');

