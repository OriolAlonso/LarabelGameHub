@extends('layouts.base')
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuari</h1>
    <form action="{{ route('usuaris.update', $usuari->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $usuari->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $usuari->email }}" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control">
            <small class="text-muted">Deixa-ho en blanc per no canviar la contrasenya</small>
        </div>
        <div class="form-group">
             <label for="plataforma_id">Plataforma:</label>
            <select name="plataforma_id" id="plataforma_id" class="form-control" required>
                @foreach($plataformas as $plataforma)
                     <option value="{{ $plataforma->id }}" {{ $usuari->plataforma_id == $plataforma->id ? 'selected' : '' }}>{{ $plataforma->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="is_admin">Administrador:</label>
            <select name="is_admin" id="is_admin" class="form-control">
                <option value="0" {{ $usuari->is_admin == 0 ? 'selected' : '' }}>No</option>
                <option value="1" {{ $usuari->is_admin == 1 ? 'selected' : '' }}>Sí</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualitzar</button>
    </form>
</div>
@endsection