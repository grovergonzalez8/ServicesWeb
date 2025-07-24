<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role')->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'ci' => 'required|unique:users,ci',
        'nombre' => 'required',
        'password' => 'required|min:6',
        'role_id' => 'required|exists:roles,id'
        ]);

        User::create([
            'ci' => $request->ci,
            'nombre' => $request->nombre,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id
        ]);

        return redirect()->route('users.index');
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
    public function edit($ci)
    {
        $user = User::findOrFail($ci);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $ci)
    {
        $user = User::findOrFail($ci);

        $request->validate([
            'nombre' => 'required',
            'role_id' => 'required|exists:roles,id'
        ]);

        $user->nombre = $request->nombre;
        $user->role_id = $request->role_id;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ci)
    {
        User::destroy($ci);
        return redirect()->route('users.index');
    }
}
