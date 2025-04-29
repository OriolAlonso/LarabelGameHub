@extends('layouts.base')
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Plataforma</h1>
    <form action="{{ route('plataformas.update', $plataforma->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $plataforma->nom }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualitzar</button>
    </form>
</div>
@endsection