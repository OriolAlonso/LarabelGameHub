<?php

namespace App\Http\Controllers;

use App\Models\Plataforma;
use Illuminate\Http\Request;

class PlataformaController extends Controller
{

    public function index()
    {
        $plataformas = Plataforma::all();
        return view('plataformas.index', compact('plataformas'));
    }


    public function create()
    {
        if (Gate::denies('admin')) {
            abort(403, 'No estás autorizado para crear una plataforma.');
        }
        return view('plataformas.create');
    }


    public function store(Request $request)
    {
        $request->validate(['nom' => 'required']);
        Plataforma::create($request->all());
        return redirect()->route('plataformas.index')->with('success', 'Plataforma creada correctament.');
    }

     public function show(Plataforma $plataforma)
    {
        return view('plataformas.show', compact('plataforma'));
    }


    public function edit(Plataforma $plataforma)
    {   
        if (Gate::denies('admin')) {
            abort(403, 'No estás autorizado para editar esta plataforma.');
        }
        return view('plataformas.edit', compact('plataforma'));
    }


    public function update(Request $request, Plataforma $plataforma)
    {
        if (Gate::denies('admin')) {
            abort(403, 'No estás autorizado para editar esta plataforma.');
        }
        $request->validate(['nom' => 'required']);
        $plataforma->update($request->all());
        return redirect()->route('plataformas.index')->with('success', 'Plataforma actualitzada correctament.');
    }


    public function destroy(Plataforma $plataforma)
    {
        if (Gate::denies('admin')) {
            abort(403, 'No estás autorizado para eliminar esta plataforma.');
        }
        $plataforma->delete();
        return redirect()->route('plataformas.index')->with('success', 'Plataforma eliminada correctament.');
    }
}
