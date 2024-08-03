<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::resource('news', HomeController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');