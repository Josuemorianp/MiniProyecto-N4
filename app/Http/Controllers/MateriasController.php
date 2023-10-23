<?php

namespace App\Http\Controllers;

use App\Models\materias;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    public function index()
    {
        $materias = materias::all();
        return $materias;
    }

    public function store(Request $request)
    {
        $request ->validate([
            'nombre'=> 'required',
            'uni_credito'=> 'required',
            'id_maestro'=> 'required'
        ]);

        $materias = new materias();
        
        $materias->nombre=$request->input('nombre');	
        $materias->uni_credito=$request->input('uni_credito');	
        $materias->id_maestro=$request->input('id_maestro');	
        
        $materias->save();
        return response()->json(['message'=> 'La materia ha sido registrado correctamente'],200);
    }

    public function update(Request $request, $id)
    {
        $request ->validate([
            'nombre'=> 'required',
            'unid_credito'=> 'required',
            'id_maestro'=> 'required',
        ]);

        $materias = materias::find($id);
        if (!$materias) {
            return response()->json(['message'=> 'La materia no ha sido registrada'],404);
        }
        $materias->nombre=$request->input('nombre');	
        $materias->uni_credito=$request->input('uni_credito');	
        $materias->id_maestro=$request->input('id_maestro');
        
        $materias->save();
        return response()->json(['message'=> 'Se ha actualizado correctamente la materia'],200);
    }

    public function destroy($id)
    {
        $materias = materias::find($id);
        if(!$materias) {
            return response()->json(["message"=> "La materia no ha sido registrada"], 404);
            materias::destroy($id);   //Sirve para eliminar el alumno de la tabla
            return response()->json(["message"=> "La materia ha sido eliminada"],200);
        }
    }
}
