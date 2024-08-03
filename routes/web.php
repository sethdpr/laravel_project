<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::middleware('check.admin')->group(function () {
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
