@extends('layouts.base')
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Usuari</h1>
    <form action="{{ route('usuaris.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nom:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="plataforma_id">Plataforma:</label>
            <select name="plataforma_id" id="plataforma_id" class="form-control" required>
                @foreach($plataformas as $plataforma)
                    <option value="{{ $plataforma->id }}">{{ $plataforma->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="is_admin">Administrador:</label>
            <select name="is_admin" id="is_admin" class="form-control">
                 <option value="0">No</option>
                 <option value="1">Sí</option>
            </select>
       </div>
        <button type="submit" class="btn btn-success mt-3">Guardar</button>
    </form>
</div>
@endsection
