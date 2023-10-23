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
        $request ->validate([
            'nombre'=> 'required',
            'apellido'=> 'required',
            'telefono'=> 'required',
            'direccion'=> 'required',
            'correo'=> 'required|correo|unique:alumno'
        ]);

        $maestro = new maestro();
        
        $maestro->id_alumno=$request->input('id_alumno');	
        $maestro->id_materia=$request->input('id_materia');	
        
        $maestro->save();
        return response()->json(['message'=> 'El maestro ha sido registrado correctamente'],200);
    }

    public function update(Request $request, $id)
    {
        $request ->validate([
            'nombre'=> 'required',
            'apellido'=> 'required',
            'telefono'=> 'required',
            'direccion'=> 'required',
            'correo'=> 'required|correo|unique:alumno'
        ]);

        $maestro = maestro::find($id);
        if (!$maestro) {
            return response()->json(['message'=> 'El maestro no ha sido registrado'],404);
        }
        $maestro->nombre=$request->input('nombre');	
        $maestro->apellido=$request->input('apellido');
        $maestro->telefono=$request->input('telefono');
        $maestro->direccion=$request->input('direccion');
        $maestro->correo=$request->input('correo');
        
        $maestro->save();
        return response()->json(['message'=> 'Se ha actualizado correctamente el maestro'],200);
    }

    public function destroy($id)
    {
        $maestro = maestro::find($id);
        if(!$maestro) {
            return response()->json(["message"=> "El maestro no ha sido registrado"], 404);
            maestro::destroy($id);   //Sirve para eliminar el alumno de la tabla
            return response()->json(["message"=> "El maestro ha sido eliminada"],200);
        }
    }
}
