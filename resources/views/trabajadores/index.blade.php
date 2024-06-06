@extends('layouts.app')

@section('content')
    <style>
        .table-container {
            display: flex;
            justify-content: center;
        }

        .table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }

        .table th,
        .table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        .table thead tr {
            background-color: #f2f2f2;
        }

        .table thead th {
            background-color: yellow;
        }

        .alert {
            margin: 20px 0;
            padding: 10px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }

        .btn {
            margin-right: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        /* Estilo para ajustar el ancho de la columna "Acciones" */
        .acciones-col {
            width: 200px; /* Ajusta este valor según sea necesario */
        }
    </style>

    <h1>Lista de Trabajadores</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('trabajadores.create') }}" class="btn btn-primary">Crear Trabajador</a>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th class="acciones-col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trabajadores as $trabajador)
                    <tr>
                        <td>{{ $trabajador->id }}</td>
                        <td>{{ $trabajador->nombre }}</td>
                        <td>{{ $trabajador->apellido }}</td>
                        <td>{{ $trabajador->email }}</td>
                        <td>{{ $trabajador->telefono }}</td>
                        <td class="acciones-col">
                            <a href="{{ route('trabajadores.show', $trabajador->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('trabajadores.edit', $trabajador->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('trabajadores.destroy', $trabajador->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
