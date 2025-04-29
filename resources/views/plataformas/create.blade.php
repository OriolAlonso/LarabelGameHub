@extends('layouts.base')
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Plataforma</h1>
    <form action="{{ route('plataformas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Guardar</button>
    </form>
</div>
@endsection
