<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;
use App\Models\InventoryEntry;
use App\Models\InventoryOutput;
use Illuminate\Support\Collection;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entradas = InventoryEntry::with(['item', 'user', 'departamento'])
            ->get()
            ->map(function ($entry) {
                return (object)[
                    'tipo' => 'Entrada',
                    'fecha' => $entry->created_at,
                    'item' => $entry->item,
                    'user' => $entry->user,
                    'departamento' => $entry->departamento,
                    'cantidad' => $entry->cantidad,
                ];
            });
        
        $salidas = InventoryOutput::with(['item', 'user', 'departamento'])
            ->get()
            ->map(function ($output) {
                return (object)[
                    'tipo' => 'Salida',
                    'fecha' => $output->created_at,
                    'item' => $output->item,
                    'user' => $output->user,
                    'departamento' => $output->departamento,
                    'cantidad' => $output->cantidad,
                ];
            });
        
        $reportes = $entradas
            ->concat($salidas)
            ->sortByDesc('fecha')
            ->values();
        
        return view('reportes.index', compact('reportes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
