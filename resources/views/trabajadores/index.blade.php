@extends('layouts.app')

@section('content')
    <h1>Lista de Trabajadores</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('trabajadores.create') }}" class="btn btn-primary">Crear Trabajador</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
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
                    <td>
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
@endsection
