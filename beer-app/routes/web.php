<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/', [PageController::class, 'production'])->name('production');
Route::get('/', [PageController::class, 'status'])->name('status');
Route::get('/', [PageController::class, 'statistics'])->name('statistics');
Route::get('/', [PageController::class, 'admin'])->name('admin');
Route::get('/', [PageController::class, 'settings'])->name('settings');