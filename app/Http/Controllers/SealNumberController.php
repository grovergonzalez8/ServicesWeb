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
        $sellos = SealNumber::with('user')
                    ->orderByDesc('number_sellos')      
                    ->paginate(15);

        return view('seal-numbers.index', [
            'sellos' => $sellos,
            'isAdmin' => Auth::check() && Auth::user()->role == 'admin'
        ]);
    }

    public function generate(Request $request)
    {
       if (Auth::user()->role !== 'admin') {
            return redirect()->route('seal-numbers.index')
                ->with('error', 'Acceso no autorizado');
        }

        DB::transaction(function () {
            $ultimoSello = SealNumber::lockForUpdate()->max('numero_sello');
            $nuevoNumero = $ultimoSello ? $ultimoSello + 1 : 1303875;
            
            SealNumber::create([
                'numero_sello' => $nuevoNumero,
                'user_ci' => Auth::user()->ci, 
                'estado' => 'disponible',
                'observacion' => 'Sello generado por ' . Auth::user()->name
            ]);
        });

        return redirect()->route('seal-numbers.index')
            ->with('success', 'Sello generado exitosamente');
    }

    public function reserve(Request $request, $id)
    {
        try {
            DB::transaction(function () use ($id, $request) {
                $sello = SealNumber::lockForUpdate()->findOrFail($id);
                
                if ($sello->estado !== 'disponible') {
                    throw new \Exception('Este sello ya está reservado');
                }
                
                $sello->update([
                    'user_ci' => Auth::user()->ci, 
                    'estado' => 'reservado',
                    'observacion' => $request->observacion ?? 'Reservado por ' . Auth::user()->name
                ]);
            });
            
            return redirect()->route('seal-numbers.index')
                ->with('success', 'Sello reservado exitosamente');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
