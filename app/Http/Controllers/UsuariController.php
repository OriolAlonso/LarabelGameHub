<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Plataforma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariController extends Controller
{

    public function index()
    {
        $usuaris = User::with('plataforma')->get();
        return view('usuaris.index', compact('usuaris'));
    }


    public function create()
    {
        $plataformas = Plataforma::all();
        return view('usuaris.create', compact('plataformas'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'plataforma_id' => 'required|exists:plataformas,id',
        ]);

        $request['password'] = Hash::make($request->password);
        User::create($request->all());

        return redirect()->route('usuaris.index')->with('success', 'Usuari creat correctament.');
    }

    public function show(User $usuari)
    {
         $usuari->load('plataforma');
        return view('usuaris.show', compact('usuari'));
    }

    public function edit(User $usuari)
    {
        $plataformas = Plataforma::all();
        return view('usuaris.edit', compact('usuari', 'plataformas'));
    }

    public function update(Request $request, User $usuari)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$usuari->id,
            'password' => 'nullable|min:8',
            'plataforma_id' => 'required|exists:plataformas,id',
        ]);

        if ($request->password) {
            $request['password'] = Hash::make($request->password);
        } else {
            unset($request['password']);
        }

        $usuari->update($request->all());
        return redirect()->route('usuaris.index')->with('success', 'Usuari actualitzat correctament.');
    }

    public function destroy(User $usuari)
    {
        $usuari->delete();
        return redirect()->route('usuaris.index')->with('success', 'Usuari eliminat correctament.');
    }
}
