<?php

namespace App\Http\Controllers;

use App\Models\Joc;
use App\Models\Plataforma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class JocController extends Controller
{

    public function index()
    {
        $jocs = Joc::all();
        return view('jocs.index', compact('jocs'));
    }


    public function create()
    {
        if (Gate::denies('admin')) {
            abort(403, 'No estás autorizado para crear un juego.');
        }
        $plataformas = Plataforma::all();
        return view('jocs.create', compact('plataformas'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'titol' => 'required',
            'descripcio' => 'required',
            'datallancament' => 'nullable|date',
            'plataformas' => 'required|array',
            'plataformas.*' => 'exists:plataformas,id',
        ]);

        $joc = Joc::create($request->except('plataformas'));
        //$joc->plataformas()->attach($request->plataformas);

        return redirect()->route('jocs.index')->with('success', 'Joc creat correctament.');
    }


    public function show(Joc $joc)
    {   
        return view('jocs.show', compact('joc'));
    }


    public function edit(Joc $joc)
    {
        if (Gate::denies('admin')) {
            abort(403, 'No estás autorizado para editar este juego.');
        }
        return view('jocs.edit', compact('joc'));
    }


    public function update(Request $request, Joc $joc)
    {
        
        if (! Gate::allows('admin')) { 
            abort(403, 'No estás autorizado para editar este juego.');
        }
        $request->validate([
            'titol' => 'required',
            'descripcio' => 'required',
            'datallancament' => 'nullable|date',
        ]);

        $joc->update($request->all());

        return redirect()->route('jocs.index')->with('success', 'Joc actualitzat correctament.');
    }


    public function destroy(Joc $joc)
    {
        if (! Gate::allows('admin')) { 
            abort(403, 'No estás autorizado para eliminar este juego.'); 
        }
        $joc->delete();
        return redirect()->route('jocs.index')->with('success', 'Joc eliminat correctament.');
    }
}
