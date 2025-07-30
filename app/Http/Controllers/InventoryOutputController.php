<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
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
        $outputs = InventoryOutput::with(['item', 'user', 'departamento'])->get();
        return view('inventory-outputs.index', compact('outputs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::all();
        $users = User::all();
        $departamentos = Departamento::all();
        return view('inventory-outputs.create', compact('items', 'users', 'departamentos'));
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
            'departamento_id' => 'required|exists:departamentos,id',
        ]);

        $userCi = $request->user_ci;
        $item = Item::where('codigo', $request->item_codigo)->first();
        
        if ($request->cantidad > $item->stock) {
            return back()->withErrors(['cantidad' => 'No hay suficiente stock disponible.'])->withInput();
        }

        InventoryOutput::create([
            'item_codigo' => $request->item_codigo,
            'cantidad' => $request->cantidad,
            'user_ci' => $userCi,
            'departamento_id' => $request->departamento_id,
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
    public function edit(InventoryOutput $inventoryOutput)
    {
        $output = $inventoryOutput;
        $departamentos = Departamento::all();
        $items = Item::all();
        $users = User::all();
        return view('inventory-outputs.edit', compact('output', 'departamentos', 'items', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InventoryOutput $inventoryOutput)
    {
        $request->validate([
            'item_codigo' => 'required|exists:items,codigo',
            'cantidad' => 'required|integer|min:1',
            'observacion' => 'nullable|string|max:1000',
            'user_ci' => 'required|exists:users,ci',
            'departamento_id' => 'required|exists:departamentos,id',
        ]);

        $inventoryOutput->update([
            'item_codigo' => $request->item_codigo,
            'cantidad' => $request->cantidad,
            'user_ci' => $request->user_ci,
            'departamento_id' => $request->departamento_id,
            'observacion' => $request->observacion,
        ]);

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
