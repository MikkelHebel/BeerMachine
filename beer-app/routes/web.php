<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')
    ;
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/production', [PageController::class, 'production'])->name('production');
Route::get('/status', [PageController::class, 'status'])->name('status');
Route::get('/statistics', [PageController::class, 'statistics'])->name('statistics');
Route::get('/admin', [PageController::class, 'admin'])->name('admin');
Route::get('/settings', [PageController::class, 'settings'])->name('settings');
