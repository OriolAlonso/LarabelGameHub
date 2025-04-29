@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Detalls del Joc</h2>
        </div>
        <div>
            <a href="{{ route('jocs.index') }}" class="btn btn-primary">Tornar</a>
        </div>
    </div>

    <div class="col-12 mt-4 bg-white p-3">
        <div class="form-group">
            <strong>Títol:</strong>
            <div>{{ $joc->titol }}</div>
        </div>
        <div class="form-group mt-2">
            <strong>Data de Llançament:</strong>
            <div>{{ $joc->datallancament }}</div>
        </div>
        <div class="form-group mt-2">
            <strong>Descripció:</strong>
            <div>{{ $joc->descripcio }}</div>
        </div>
    </div>
</div>
@endsection