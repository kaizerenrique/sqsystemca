<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Persona;

class ApiController extends Controller
{
    //retorna listado de usuarios
    public function infouser(Request $request)
    {
        return $request->user();
    }

    //retorna listado de personas
    public function listadoPersonas()
    {
        //Usuario
        $user_id = auth()->user()->id;
        $pasientes = Persona::where("user_id", $user_id)->get();

        //Respuesta
        return response([
            "status" => 1,
            "ms" => "Listado",
            "data" => $pasientes
        ]);
    }

    //Ingresar Registro

}
