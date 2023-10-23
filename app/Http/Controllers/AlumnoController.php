<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumno = alumno::all();
        return $alumno;
    }

    public function store(Request $request)
    {
        $request ->validate([
            'nombre'=> 'required',
            'apellido'=> 'required',
            'telefono'=> 'required',
            'direccion'=> 'required',
            'correo'=> 'required|correo|unique:alumno'
        ]);

        $alumno = new alumno();
        
        $alumno->nombre=$request->input('nombre');	
        $alumno->apellido=$request->input('apellido');	
        $alumno->telefono=$request->input('telefono');	
        $alumno->direccion=$request->input('direccion');	
        $alumno->correo=$request->input('correo');
        
        $alumno->save();
        return response()->json(['message'=> 'El alumno se ha actualizado correctamente'],200);
    }

    public function show($id)
    {
        $alumno = alumno::find($id);
        if (!$alumno) {
            return response()-> json(['message' => 'El alumno no ha sido registrado'],404);
        }
        return response()->json($alumno);
    }

    public function update(Request $request, $id)
    {
        $request ->validate([
            'nombre'=> 'required',
            'apellido'=> 'required',
            'telefono'=> 'required',
            'direccion'=> 'required',
            'correo'=> 'required|correo|unique:alumno',
        ]);

        $alumno = alumno::find($id);
        if (!$alumno) {
            return response()->json(['message'=> 'El alumno no ha sido registrado'],404);
        }
        $alumno->nombre=$request->input('nombre');	
        $alumno->apellido=$request->input('apellido');	
        $alumno->telefono=$request->input('telefono');	
        $alumno->direccion=$request->input('direccion');	
        $alumno->correo=$request->input('correo');
        
        $alumno->save();
        return response()->json(['message'=> 'El alumno se ha actualizado correctamente'],200);
    }

    public function destroy($id)
    {
        $alumno = alumno::find($id);
        if(!$alumno) {
            return response()->json(["message"=> "El alumno no ha sido registrado"], 404);
            alumno::destroy($id);   //Sirve para eliminar el alumno de la tabla
            return response()->json(["message"=> "El alumno fue eliminado por terminator"],200);
        }
    }
}