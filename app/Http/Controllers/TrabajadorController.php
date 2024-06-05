<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    public function index()
    {
        // Obtener todos los trabajadores desde MongoDB
        $trabajadores = Trabajador::all();

        // Devolver la vista 'trabajadores.index' con los datos de los trabajadores
        return view('trabajadores.index', compact('trabajadores'));
    }

    public function create()
    {
        // Devolver la vista 'trabajadores.create' para mostrar el formulario de creación
        return view('trabajadores.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del request
        $validatedData = $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|string|email|unique:trabajadores,email',
            'telefono' => 'nullable|string',
        ]);

        // Guardar en MongoDB
        $trabajador = Trabajador::create($validatedData);

        // Redirigir a la vista de índice con un mensaje de éxito
        return redirect()->route('trabajadores.index')->with('success', 'Trabajador creado exitosamente.');
    }

    public function show($id)
    {
        // Buscar en MongoDB por ID
        $trabajador = Trabajador::findOrFail($id);

        // Devolver la vista 'trabajadores.show' con los datos del trabajador
        return view('trabajadores.show', compact('trabajador'));
    }

    public function edit($id)
    {
        // Buscar en MongoDB por ID
        $trabajador = Trabajador::findOrFail($id);

        // Devolver la vista 'trabajadores.edit' con los datos del trabajador
        return view('trabajadores.edit', compact('trabajador'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del request
        $validatedData = $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|string|email|unique:trabajadores,email,' . $id,
            'telefono' => 'nullable|string',
        ]);

        // Actualizar en MongoDB
        $trabajador = Trabajador::findOrFail($id);
        $trabajador->update($validatedData);

        // Redirigir a la vista de índice con un mensaje de éxito
        return redirect()->route('trabajadores.index')->with('success', 'Trabajador actualizado exitosamente.');
    }

    public function destroy($id)
    {
        // Eliminar de MongoDB
        $trabajador = Trabajador::findOrFail($id);
        $trabajador->delete();

        // Redirigir a la vista de índice con un mensaje de éxito
        return redirect()->route('trabajadores.index')->with('success', 'Trabajador eliminado exitosamente.');
    }
}
