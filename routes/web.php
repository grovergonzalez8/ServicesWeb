<?php

use App\Models\User;
use App\Models\Item;
use App\Models\InventoryOutput;
use App\Models\Reporte;
use Illuminate\Support\Facades\Route;

Route::get('/users', function () {
    return User::all();
});

Route::get('/items', function () {
    return Item::all();
});

Route::get('/inventory-outputs', function () {
    return InventoryOutput::with(['user', 'item', 'departamento'])->get();
});

Route::get('/reportes', function () {
    $reportes = Reporte::with(['item', 'user', 'departamento'])->get();
    return view('reportes.index', compact('reportes'));
});