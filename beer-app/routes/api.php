<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('/status/batch', [ApiController::class, 'BatchStatus'])->name('batch.status');
Route::get('/status/machine', [ApiController::class, 'MachineStatus'])->name('machine.status');
Route::get('/status/inventory', [ApiController::class, 'InventoryStatus'])->name('inventory.status');
Route::get('/status/queue', [ApiController::class, 'QueueStatus'])->name('queue.status');
Route::post('/command', [ApiController::class, 'SendCommand'])->name('send.command');

Route::get('/expected-failure-rate', [\App\Http\Controllers\BatchController::class, 'expectedFailureRate']);