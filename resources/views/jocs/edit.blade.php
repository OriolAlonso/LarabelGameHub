@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Joc</h1>
    <form action="{{ route('jocs.update', $joc->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titol">Títol:</label>
            <input type="text" name="titol" id="titol" class="form-control" value="{{ $joc->titol }}" required>
        </div>
        <div class="form-group">
            <label for="descripcio">Descripció:</label>
            <textarea name="descripcio" id="descripcio" class="form-control" required>{{ $joc->descripcio }}</textarea>
        </div>
        <div class="form-group">
            <label for="datallancament">Data de Llançament:</label>
            <input type="date" name="datallancament" id="datallancament" class="form-control" value="{{ $joc->datallancament }}">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualitzar</button>
    </form>
</div>
@endsection
