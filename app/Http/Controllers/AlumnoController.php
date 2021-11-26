<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    public function getAll(Request $request){
        return response()->json([
            'succes' => true,
            'mensaje' => 'Obtengo todos los alumnos desde el controller',
            'data' => DB::table('alumno')->get()
        ]);
    }

    public function deleteAlumno(Request $request, $id){
        $user = DB::table('alumno')->where('id', $id)->first();
        if ($user == null){
            return response()->json([
            ], 404);
        }
        DB::table('alumno')->where('id', $id)->delete();
        //return
    }

    public function getAlumno(Request $request , $id){
        if (ctype_digit($id)){
            return response()->json([
                'succes' => true,
                'mensaje' => 'Obtengo todos los alumnos desde el controller',
                'data' => DB::table('alumno')->where('id', $id)->first()
            ]);
        }
        return "Obtengo todos los alumnos desde el controller";
    }


    public function insert(Request $request){
        $datos = $request->only(['name','telefono','edad','password','email','sexo']);
        $request->validate([
            'name'=>'max:32',
            'telefono'=>'max:16|nullable',
            'edad'=>'nullable',
            'password'=>'max:64',
            'email'=>'max:255|unique:alumno',
            'sexo'=>'max:6'
        ]);

        try{
            DB::table('alumno')->insert($datos);
        }catch(\Exception $e){
            return "error $e";
        }
    }

    public function modificar(Request $request, $id)
    {
        $datos = $request->only(['name', 'telefono', 'edad', 'password', 'email', 'sexo']);
        $request->validate([
            'name' => 'max:32',
            'telefono' => 'max:16|nullable',
            'edad' => 'nullable',
            'password' => 'max:64',
            'email' => 'max:255|unique:alumno',
            'sexo' => 'max:6'
        ]);

        try {
            DB::table('alumno')->where('id',$id)->update($datos);
        } catch (\Exception $e) {
            return "error $e";
        }
    }

}


