<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

use App\Http\Controllers\ApiController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/production', [PageController::class, 'production'])->name('production');
Route::get('/status', [PageController::class, 'status'])->name('status');
Route::get('/statistics', [PageController::class, 'statistics'])->name('statistics');
Route::get('/admin', [PageController::class, 'admin'])->name('admin');
Route::get('/settings', [PageController::class, 'settings'])->name('settings');

Route::get('/status/batch', [ApiController::class, 'BatchStatus'])->name('batch.status');
Route::get('/status/machine', [ApiController::class, 'MachineStatus'])->name('machine.status');
Route::get('/status/inventory', [ApiController::class, 'InventoryStatus'])->name('inventory.status');