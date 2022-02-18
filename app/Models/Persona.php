<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Persona extends Model
{
    use HasFactory;
    protected $fillable =['idusuario','nombre','apellido','nac','cedula',
    'pasaporte','fnacimiento','nrotelefono','email','direccion','destinovuela','fvuelo','numerodevuelo'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}



