<?php

use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InventoryEntryController;
use App\Http\Controllers\InventoryOutputController;
use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Route;

Route::resource('users', UserController::class);

Route::resource('departamentos', DepartamentoController::class);

Route::resource('items', ItemController::class);

Route::resource('inventory-entries', InventoryEntryController::class)->except(['show', 'edit', 'update', 'destroy']);

Route::resource('inventory-outputs', InventoryOutputController::class);

Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');

Route::get('/seal-numbers', function () {
    return 'Aqui ira la vista de departamentos';
});

Route::get('/letter-numbers', function () {
    return 'Aqui ira la vista de departamentos';
});

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');