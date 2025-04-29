@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Llista d'Usuaris</h1>
    <a href="{{ route('usuaris.create') }}" class="btn btn-primary mb-3">Crear Usuari</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Plataforma</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuaris as $usuari)
            <tr>
                <td>{{ $usuari->name }}</td>
                <td>{{ $usuari->email }}</td>
                 <td>{{ $usuari->plataforma->nom ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('usuaris.show', $usuari->id) }}" class="btn btn-info btn-sm">Veure</a>
                    <a href="{{ route('usuaris.edit', $usuari->id) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('usuaris.destroy', $usuari->id) }}" method="POST" class="d-inline">
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