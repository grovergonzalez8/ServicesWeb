<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SealNumber;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SealNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellos = SealNumber::with('user')->orderByDesc('number_sellos')->paginate(15);
        return view('seal-numbers.index', compact('sellos'));
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

    public function generate(Request $request)
    {
        $ultimoSello = SealNumber::max('numero_sello');
        $nuevoNumero = $ultimoSello ? $ultimoSello + 1 : 1303875;
        
        SealNumber::create([
            'numero_sello' => $nuevoNumero,
            'user_ci' => null,
            'observacion' => 'Sello generado automáticamente'
        ]);

        return redirect()->route('seal-numbers.index')->with('success', 'Sello generado!');
    }

    public function reserve(Request $request, $id)
    {
        $sello = SealNumber::findOrFail($id);
        
        if ($sello->user_ci) {
            return back()->with('error', 'Este sello ya está reservado');
        }

        DB::transaction(function () use ($sello) {
            $sello->update([
                'user_ci' => Auth::user()->ci,
                'observacion' => $request->observacion ?? 'Reservado por ' . Auth::user()->name
            ]);
        });

        return redirect()->route('seal-numbers.index')->with('success', 'Sello reservado!');
    }
}
