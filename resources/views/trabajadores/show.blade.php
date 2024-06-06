@extends('layouts.app')

@section('content')
    <style>
        .card {
            width: 50%;
            margin: 50px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #dc3545; /* Color rojo */
            color: #fff;
            font-weight: bold;
            text-align: center; /* Centra el texto */
        }

        .card-body {
            padding: 20px;
        }

        .btn-warning,
        .btn-danger {
            margin-top: 10px;
        }

        /* Estilo para cambiar el color del botón Eliminar */
        .btn-danger {
            background-color: #007bff; /* Color azul */
            border-color: #007bff;
        }
    </style>

    <h1 style="text-align: center;">Detalles del Trabajador</h1> <!-- Centra el título -->

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
