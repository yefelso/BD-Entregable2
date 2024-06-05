@extends('layouts.app')

@section('content')
    <h1>Detalles del Trabajador</h1>

    <div class="card">
        <div class="card-header">
            Trabajador #{{ $trabajador->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $trabajador->nombre }} {{ $trabajador->apellido }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $trabajador->email }}</p>
            <p class="card-text"><strong>Teléfono:</strong> {{ $trabajador->telefono }}</p>
            <a href="{{ route('trabajadores.edit', $trabajador->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('trabajadores.destroy', $trabajador->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
@endsection