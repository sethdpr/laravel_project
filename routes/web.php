<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SquadController;
use App\Http\Controllers\LegendController;   

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news', [NewsController::class, 'store'])->name('news.store');

Route::get('news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::put('news/{id}', [NewsController::class, 'update'])->name('news.update');

Route::delete('news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

Route::get('user/{name}', [UserController::class, 'profile'])->name('profile');

Route::get('/squad', [SquadController::class, 'index'])->name('squad');

Route::get('/legends', [LegendController::class, 'index'])->name('legends');

Route::get('/calendar', function () {
    return view('calendar');
})->name('calendar');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
