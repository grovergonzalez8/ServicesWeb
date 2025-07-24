<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|unique:items,codigo',
            'nombre' => 'required|string',
            'stock' => 'required|integer|min:0',
            'unidad_medida' => 'required|string',
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')->with('success', 'Item creado correctamente.');
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
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'codigo' => 'required|string|unique:items,codigo,' . $item->codigo . ',codigo',
            'nombre' => 'required|string',
            'stock' => 'required|integer|min:0',
            'unidad_medida' => 'required|string',
        ]);

        $item->update([
            'nombre' => $request->nombre,
            'stock' => $request->stock,
            'unidad_medida' => $request->unidad_medida,
        ]);

        return redirect()->route('items.index')->with('success', 'Item actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item eliminado correctamente.');
    }
}
