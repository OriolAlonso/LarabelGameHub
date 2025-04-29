@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Llista de Plataformes</h1>
    <a href="{{ route('plataformas.create') }}" class="btn btn-primary mb-3">Crear Plataforma</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($plataformas as $plataforma)
            <tr>
                <td>{{ $plataforma->nom }}</td>
                <td>
                    <a href="{{ route('plataformas.show', $plataforma->id) }}" class="btn btn-info btn-sm">Veure</a>
                    <a href="{{ route('plataformas.edit', $plataforma->id) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('plataformas.destroy', $plataforma->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Estàs segur?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
