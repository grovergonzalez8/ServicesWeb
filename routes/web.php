<?php

use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Models\InventoryOutput;
use App\Models\Reporte;
use Illuminate\Support\Facades\Route;

Route::get('users', UserController::class);

Route::resource('departamentos', DepartamentoController::class);

Route::resource('items', ItemController::class);

Route::get('/inventory-entries', function () {
    return 'Aqui ira la vista de departamentos';
});

Route::get('/inventory-outputs', function () {
    return InventoryOutput::with(['user', 'item', 'departamento'])->get();
});

Route::get('/reportes', function () {
    $reportes = Reporte::with(['item', 'user', 'departamento'])->get();
    return view('reportes.index', compact('reportes'));
});

Route::get('/seal-numbers', function () {
    return 'Aqui ira la vista de departamentos';
});

Route::get('/letter-numbers', function () {
    return 'Aqui ira la vista de departamentos';
});

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');