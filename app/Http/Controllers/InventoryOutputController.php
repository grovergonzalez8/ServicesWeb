<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryOutput;
use App\Models\Item;
use App\Models\User;
use Carbon\Carbon;

class InventoryOutputController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outputs = InventoryOutput::with('item', 'user')->latest()->get();
        return view('inventory-outputs.index', compact('outputs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::all();
        $users = User::all();
        return view('inventory-outputs.create', compact('items', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_codigo' => 'required|exists:items,codigo',
            'cantidad' => 'required|integer|min:1',
            'observacion' => 'nullable|string|max:1000',
            'user_ci' => 'required|exists:users,ci',
        ]);

        $userCi = $request->user_ci;

        $item = Item::where('codigo', $request->item_codigo)->first();
        
        if ($request->cantidad > $item->stock) {
            return back()->withErrors(['cantidad' => 'No hay suficiente stock disponible.']);
        }

        InventoryOutput::create([
            'item_codigo' => $request->item_codigo,
            'cantidad' => $request->cantidad,
            'user_ci' => $userCi,
            'fecha' => Carbon::now(),
            'observacion' => $request->observacion,
        ]);

        $item->stock -= $request->cantidad;
        $item->save();

        return redirect()->route('inventory-outputs.index')->with('success', 'Salida registrada correctamente.');
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
        $output = InventoryOutput::findOrFail($id);
        $items = Item::all();
        $users = User::all();
        return view('inventory-outputs.edit', compact('output', 'items', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $output = InventoryOutput::findOrFail($id);

        $request->validate([
            'item_codigo' => 'required|exists:items,codigo',
            'cantidad' => 'required|integer|min:1',
            'observacion' => 'nullable|string|max:1000',
        ]);

        $item = Item::where('codigo', $output->item_codigo)->first();

        $item->stock += $output->cantidad;

        $nuevoItem = Item::where('codigo', $request->item_codigo)->first();
        if ($request->cantidad > $nuevoItem->stock) {
            return back()->withErrors(['cantidad' => 'No hay suficiente stock para el nuevo valor.']);
        }

        $output->update([
            'item_codigo' => $request->item_codigo,
            'cantidad' => $request->cantidad,
            'observacion' => $request->observacion,
        ]);

        $nuevoItem->stock -= $request->cantidad;
        $item->save();
        $nuevoItem->save();

        return redirect()->route('inventory-outputs.index')->with('success', 'Salida actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $output = InventoryOutput::findOrFail($id);

        $item = Item::where('codigo', $output->item_codigo)->first();
        $item->stock += $output->cantidad;
        $item->save();

        $output->delete();

        return redirect()->route('inventory-outputs.index')->with('success', 'Salida eliminada correctamente.');
    }
}
