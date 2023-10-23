<?php

namespace App\Http\Controllers;

use App\Models\curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $curso = curso::all();
        return $curso;
    }

    public function store(Request $request)
    {
        $request ->validate([
            'id_alumno'=> 'required',
            'id_materia'=> 'required'
        ]);

        $curso = new curso();
        
        $curso->id_alumno=$request->input('id_alumno');	
        $curso->id_materia=$request->input('id_materia');	
        
        $curso->save();
        return response()->json(['message'=> 'El curso ha sido registrado'],200);
    }

    public function update(Request $request, $id)
    {
        $request ->validate([
            'id_alumno'=> 'required',
            'id_materia'=> 'required',
        ]);

        $curso = curso::find($id);
        if (!$curso) {
            return response()->json(['message'=> 'El curso no ha sido registrado'],404);
        }
        $curso->id_alumno=$request->input('id_alumno');	
        $curso->id_materia=$request->input('id_materia');
        
        $curso->save();
        return response()->json(['message'=> 'Se ha actualizado correctamente el curso'],200);
    }

    public function destroy($id)
    {
        $curso = curso::find($id);
        if(!$curso) {
            return response()->json(["message"=> "El curso no ha sido registrado"], 404);
            curso::destroy($id);   //Sirve para eliminar el alumno de la tabla
            return response()->json(["message"=> "El curso ha sido eliminada"],200);
        }
    }
}
