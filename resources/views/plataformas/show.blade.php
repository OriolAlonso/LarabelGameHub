@extends('layouts.base')
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Detalls de la Plataforma</h2>
        </div>
        <div>
            <a href="{{ route('plataformas.index') }}" class="btn btn-primary">Tornar</a>
        </div>
    </div>

    <div class="col-12 mt-4 bg-white p-3">
        <div class="form-group">
            <strong>Nom:</strong>
            <div>{{ $plataforma->nom }}</div>
        </div>
    </div>
</div>
@endsection