@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Llista de Jocs</h1>
    <a href="{{ route('jocs.create') }}" class="btn btn-primary mb-3">Crear Joc</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Títol</th>
                <th>Descripció</th>
                <th>Data de Llançament</th>
                <th>Plataformes</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jocs as $joc)
            <tr>
                <td>{{ $joc->titol }}</td>
                <td>{{ $joc->descripcio }}</td>
                <td>{{ $joc->datallancament }}</td>
                <!--<td>
                    @foreach ($jocs as $joc)
                    @endforeach
                </td>-->
                <td>
                    <a href="{{ route('jocs.show', $joc->id) }}" class="btn btn-info btn-sm">Veure</a>
                    <a href="{{ route('jocs.edit', $joc->id) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('jocs.destroy', $joc->id) }}" method="POST" class="d-inline">
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