<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $fillable =['idusuario','nombre','apellido','nac','cedula',
    'pasaporte','fnacimiento','nrotelefono','email','direccion','destinovuela','fvuelo','numerodevuelo'];
}



