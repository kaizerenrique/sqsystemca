<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Persona;

class Personas extends Component
{
    //Definicion de Variable
    public $personas, $idusuario, $nombre, $apellido, $nac, $cedula, $pasaporte, $fnacimiento, $nrotelefono, $email, $direccion, $destinovuela, $fvuelo, $numerodevuelo;
    public $modal = false;

    public function render()
    {
        $this->personas = Persona::all();
        return view('livewire.personas');
    }

    public function crear(){
        //$this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal(){
        $this->modal = true;
    }

    public function cerrarModal(){
        $this->modal = false;
    }

    public function limpiarCampos(){
        $this->$nombre = '';
        $this->$apellido = '';
        $this->$nac = '';
        $this->$cedula = '';
        $this->$pasaporte = '';
        $this->$fnacimiento = '';
        $this->$nrotelefono = '';
        $this->$email = '';
        $this->$direccion = '';
        $this->$destinovuela = '';
        $this->$fvuelo = '';
        $this->$numerodevuelo = '';
    }
}
