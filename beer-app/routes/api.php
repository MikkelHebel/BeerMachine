<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BatchController;

Route::get('/status/batch', [ApiController::class, 'BatchStatus'])->name('batch.status');
Route::get('/status/machine', [ApiController::class, 'MachineStatus'])->name('machine.status');
Route::get('/status/inventory', [ApiController::class, 'InventoryStatus'])->name('inventory.status');
Route::get('/status/queue', [ApiController::class, 'QueueStatus'])->name('queue.status');
Route::get('/status/maintenance', [ApiController::class, 'MaintenanceStatus'])->name('maintenance.status');
Route::post('/command', [ApiController::class, 'SendCommand'])->name('send.command');

Route::get('/expected-failure-rate', [BatchController::class, 'expectedFailureRate']);
