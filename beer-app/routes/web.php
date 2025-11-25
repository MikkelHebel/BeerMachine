<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->controller(PageController::class)->group(function() {
    Route::get('/', 'home')->name('home');
    Route::get('/production', 'production')->name('production');
    Route::get('/status', 'status')->name('status');
    Route::get('/statistics', 'statistics')->name('statistics');
    Route::get('/settings', 'settings')->name('settings');
});

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/admin', [PageController::class, 'admin'])->name('admin');

    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/users', [UserController::class, 'store'])->name('user.store');

    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');

    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});
