<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CnnBeritaController;
Route::get('/berita/{kategori?}', [BeritaController::class, 'index'])->name('front.beritaindo');
Route::get('/beritaindo/download-csv', [BeritaController::class, 'downloadCsv'])->name('front.beritaindo.csv');



Route::get('/cnnberita/{kategori?}', [CnnBeritaController::class, 'indexCnn'])->name('front.cnnindo');
Route::get('/cnnberita/download-csv', [CnnBeritaController::class, 'downloadCsvcnn'])->name('front.cnnindo.csv');


Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/details/{article_news:slug}', [FrontController::class, 'details'])->name('front.details');
Route::get('/category/{category:slug}', [FrontController::class, 'category'])->name('front.category');
Route::get('/author/{author:slug}', [FrontController::class, 'author'])->name('front.author');
Route::get('/search', [FrontController::class, 'search'])->name('front.search');
// routes/web.php

Route::get('/news', [NewsController::class, 'BeritaIndo'])->name('front.news');

Route::get('/news/download', [NewsController::class, 'downloadCSV'])->name('front.news.csv');

