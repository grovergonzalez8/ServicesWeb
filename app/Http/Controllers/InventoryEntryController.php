<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryEntry;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class InventoryEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = InventoryEntry::with(['user', 'item'])->orderBy('fecha', 'desc')->paginate(15);
        return view('inventory-entries.index', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::all();
        return view('inventory-entries.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_codigo' => 'required|exists:items,codigo',
            'cantidad' => 'required|integer|min:1',
            'fecha' => 'required|date',
            'observacion' => 'nullable|string|max:550'
        ]);

        InventoryEntry::create([
            'item_codigo' => $request->item_codigo,
            'cantidad' => $request->cantidad,
            'user_ci' => Auth::user()->ci,  // asumiendo autenticación
            'fecha' => $request->fecha,
            'observacion' => $request->observacion,
        ]);

        return redirect()->route('inventory-entries.index')->with('success', 'Entrada de inventario registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
