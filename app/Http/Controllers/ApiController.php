<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        // Obtener todos los trabajadores desde MongoDB
        $trabajadores = Trabajador::all();

        return response()->json([
            'trabajadores' => $trabajadores
        ], 200);
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

        return response()->json([
            'trabajador' => $trabajador
        ], 201);
    }

    public function show($id)
    {
        // Buscar en MongoDB por ID
        $trabajador = Trabajador::findOrFail($id);

        return response()->json([
            'trabajador' => $trabajador
        ], 200);
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

        return response()->json([
            'trabajador' => $trabajador
        ], 200);
    }

    public function destroy($id)
    {
        // Eliminar de MongoDB
        $trabajador = Trabajador::findOrFail($id);
        $trabajador->delete();

        return response()->json(null, 204);
    }
}
