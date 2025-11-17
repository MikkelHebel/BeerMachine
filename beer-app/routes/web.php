<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->controller(PageController::class)->group(function() {
    Route::get('/', 'home')->name('home');
    Route::get('/production', 'production')->name('production');
    Route::get('/status', 'status')->name('status');
    Route::get('/statistics', 'statistics')->name('statistics');
    Route::get('/admin', 'admin')->name('admin');
    Route::get('/settings', 'settings')->name('settings');
});
