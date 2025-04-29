@extends('layouts.base')
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Joc</h1>
    <form action="{{ route('jocs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titol">Títol:</label>
            <input type="text" name="titol" id="titol" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descripcio">Descripció:</label>
            <textarea name="descripcio" id="descripcio" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="datallancament">Data de Llançament:</label>
            <input type="date" name="datallancament" id="datallancament" class="form-control">
        </div>
        <div class="form-group">
            <label for="plataformas">Plataformes:</label>
            <select name="plataformas[]" id="plataformas" class="form-control" multiple required>
                @foreach($plataformas as $plataforma)
                    <option value="{{ $plataforma->id }}">{{ $plataforma->nom }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">Guardar</button>
    </form>
</div>
@endsection