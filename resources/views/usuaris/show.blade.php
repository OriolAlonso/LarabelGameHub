@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Detalls de l'Usuari</h2>
        </div>
        <div>
            <a href="{{ route('usuaris.index') }}" class="btn btn-primary">Tornar</a>
        </div>
    </div>

    <div class="col-12 mt-4 bg-white p-3">
        <div class="form-group">
            <strong>Nom:</strong>
            <div>{{ $usuari->name }}</div>
        </div>
        <div class="form-group mt-2">
            <strong>Email:</strong>
            <div>{{ $usuari->email }}</div>
        </div>
        <div class="form-group mt-2">
            <strong>Plataforma:</strong>
            <div>{{ $usuari->plataforma ? $usuari->plataforma->nom : 'Sense plataforma' }}</div>
        </div>
        <div class="form-group mt-2">
            <strong>Administrador:</strong>
            <div>
                @if ($usuari->is_admin)
                    Sí
                @else
                    No
                @endif
            </div>
        </div>
    </div>
</div>
@endsection