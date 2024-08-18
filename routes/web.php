<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SquadController;
use App\Http\Controllers\LegendController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;

Route::get('/', [NewsController::class, 'index'])->name('home');
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news', [NewsController::class, 'store'])->name('news.store');
Route::get('news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::put('news/{id}', [NewsController::class, 'update'])->name('news.update');
Route::delete('news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

Route::get('user/{name}', [UserController::class, 'profile'])->name('profile');

Route::get('/squad', [SquadController::class, 'index'])->name('squad');
Route::resource('players', SquadController::class)->except(['index', 'show']);

Route::get('/views/legends', [LegendController::class, 'index'])->name('legends');
Route::resource('legends', LegendController::class);

Route::get('/views/calendar', [GameController::class, 'index'])->name('calendar');
Route::resource('games', GameController::class);

Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/faq/create', [FaqController::class, 'create'])->name('faq.create');
Route::post('/faq', [FaqController::class, 'store'])->name('faq.store');
Route::get('/faq/{id}/edit', [FaqController::class, 'edit'])->name('faq.edit');
Route::put('/faq/{id}', [FaqController::class, 'update'])->name('faq.update');
Route::delete('/faq/{id}', [FaqController::class, 'destroy'])->name('faq.destroy');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/about', function () {
    return view('about');
})->name('about');

Auth::routes();