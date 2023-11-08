<?php

namespace App\Http\Controllers;

use App\Models\maestro;
use Illuminate\Http\Request;

class MaestroController extends Controller
{
    public function index()
    {
        $maestro = maestro::all();
        return $maestro;
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'correo' => 'required'
        ]);

        $maestro = new maestro();

        $maestro->nombre = $request->input('nombre');
        $maestro->apellido = $request->input('apellido');
        $maestro->telefono = $request->input('telefono');
        $maestro->direccion = $request->input('direccion');
        $maestro->correo = $request->input('correo');

        $maestro->save();
        return response()->json(['message' => 'El Maestro ha sido registrado correctamente'], 200);
    }
    public function show($id)
    {
        $maestro = maestro::find($id);
        if (!$maestro) {
            return response()->json(["message" => "Maestro no encontrado"], 404);
        }

        return response()->json($maestro);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'correo' => 'required'
        ]);

        $maestro = maestro::find($id);
        if (!$maestro) {
            return response()->json(['message' => 'Maestro no ha sido registrado'], 404);
        }
        $maestro->nombre = $request->input('nombre');
        $maestro->apellido = $request->input('apellido');
        $maestro->telefono = $request->input('telefono');
        $maestro->direccion = $request->input('direccion');
        $maestro->correo = $request->input('correo');

        $maestro->save();
        return response()->json(['message' => 'Se ha actualizado correctamente el Maestro'], 200);
    }

    public function destroy($id)
    {
        $maestro = maestro::find($id);
        if (!$maestro) {
            return response()->json(["message" => "Maestro no encontrado"], 404);
        }
        $maestro->delete($id);
        return response()->json(["message" => "Maestro eliminado"], 200);
    }
}
