<?php

namespace App\Http\Controllers;

use App\Models\asistencia;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function index()
    {
        $asistencia = asistencia::all();
        return $asistencia;
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_curso' => 'required',
            'id_alumno' => 'required',
            'fecha' => 'required',
            'Asistencia' => 'required'
        ]);

        $asistencia = new asistencia();

        $asistencia->id_curso = $request->input('id_curso');
        $asistencia->id_alumno = $request->input('id_alumno');
        $asistencia->fecha = $request->input('fecha');
        $asistencia->Asistencia = $request->input('Asistencia');

        $asistencia->save();
        return response()->json(['message' => 'Se ha registrado la asistencia'], 200);
    }
    public function show($id)
    {
        $asistencia = asistencia::find($id);
        if (!$asistencia) {
            return response()->json(["message" => "El alumno no ha asistido en esta fecha"], 404);
        }

        return response()->json($asistencia);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_curso' => 'required',
            'id_alumno' => 'required',
            'fecha' => 'required',
            'Asistencia' => 'required',
        ]);

        $asistencia = asistencia::find($id);
        if (!$asistencia) {
            return response()->json(['message' => 'El alumno no ha asistido en esta fecha'], 404);
        }
        $asistencia->id_curso = $request->input('id_curso');
        $asistencia->id_alumno = $request->input('id_alumno');
        $asistencia->fecha = $request->input('fecha');
        $asistencia->Asistencia = $request->input('Asistencia');

        $asistencia->save();
        return response()->json(['message' => 'Se ha actualizado correctamente la asistencia'], 200);
    }

    public function destroy($id)
    {
        $asistencia = asistencia::find($id);
        if (!$asistencia) {
            return response()->json(["message" => "Maestro no encontrado"], 404);
        }
        $asistencia->delete($id);
        return response()->json(["message" => "Maestro eliminado"], 200);
    }
}
