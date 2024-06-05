<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateTrabajadorViews extends Command
{
    protected $signature = 'make:trabajador-views';

    protected $description = 'Generate views for TrabajadorController';

    public function handle()
    {
        $viewsPath = resource_path('views/trabajadores');

        // Crear el directorio de vistas si no existe
        if (!File::exists($viewsPath)) {
            File::makeDirectory($viewsPath, 0755, true);
        }

        // Contenido de las vistas
        $views = [
            'index.blade.php' => $this->getIndexView(),
            'create.blade.php' => $this->getCreateView(),
            'edit.blade.php' => $this->getEditView(),
            'show.blade.php' => $this->getShowView(),
        ];

        // Crear cada vista
        foreach ($views as $fileName => $content) {
            File::put($viewsPath . '/' . $fileName, $content);
        }

        $this->info('Views for TrabajadorController have been generated successfully.');
    }

    private function getIndexView()
    {
        return <<<'blade'
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
blade;
    }

    private function getCreateView()
    {
        return <<<'blade'
@extends('layouts.app')

@section('content')
    <h1>Crear Trabajador</h1>

    <form action="{{ route('trabajadores.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono">
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection
blade;
    }

    private function getEditView()
    {
        return <<<'blade'
@extends('layouts.app')

@section('content')
    <h1>Editar Trabajador</h1>

    <form action="{{ route('trabajadores.update', $trabajador->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $trabajador->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $trabajador->apellido }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $trabajador->email }}" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $trabajador->telefono }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
blade;
    }

    private function getShowView()
    {
        return <<<'blade'
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
blade;
    }
}
