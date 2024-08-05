<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news', [NewsController::class, 'store'])->name('news.store');

Route::get('news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::put('news/{id}', [NewsController::class, 'update'])->name('news.update');

Route::get('user/{name}', [UserController::class, 'profile'])->name('profile');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
