@extends('layouts.base')
@extends('layouts.app')

@section('content')
<div class="row" class="container">
    <div class="col-12">
        <div>       
            <h2>Llista de Jocs</h2>
        </div>
        <div>
            @can('admin')

            <a href="{{ route('jocs.create') }}" class="btn btn-primary">Crear Joc</a>
            @endcan
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success mt-2">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif
    <div class="col-12 mt-4">
        <table class="table table-bordered">
            <thead class="text-dark">
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
                    <td class="fw-bold text-dark">{{ $joc->titol }}</td>
                    <td class="text-dark">{{ $joc->descripcio }}</td>
                    <td class="text-dark">{{ $joc->datallancament }}</td>
                    <td>
                        
                    </td>
                    <td>
                        <a href="{{ route('jocs.show', $joc->id) }}" class="btn btn-info">Veure</a>
                        @can('admin')<a href="{{ route('jocs.edit', $joc->id) }}" class="btn btn-warning ms-2">Editar</a>
                        <form action="{{ route('jocs.destroy', $joc->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ms-2" onclick="return confirm('Estàs segur?')">Eliminar</button>
                        </form>@endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection