<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BeritaController;

Route::get('/berita/{kategori?}', [BeritaController::class, 'index'])->name('front.beritaindo');

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/details/{article_news:slug}', [FrontController::class, 'details'])->name('front.details');
Route::get('/category/{category:slug}', [FrontController::class, 'category'])->name('front.category');
Route::get('/author/{author:slug}', [FrontController::class, 'author'])->name('front.author');
Route::get('/search', [FrontController::class, 'search'])->name('front.search');
// routes/web.php

Route::get('/berita', [NewsController::class, 'index'])->name('front.berita');
