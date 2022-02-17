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

    public function editar($id){
        $persona = Persona::findOrFail($id);
        $this->id = $id;
        $this->nombre = $persona->nombre;
        $this->apellido = $persona->apellido;
        $this->nac = $persona->nac;
        $this->cedula = $persona->cedula;
        $this->pasaporte = $persona->pasaporte;
        $this->fnacimiento = $persona->fnacimiento;
        $this->nrotelefono = $persona->nrotelefono;
        $this->email = $persona->email;
        $this->direccion = $persona->direccion;
        $this->destinovuela = $persona->destinovuela;
        $this->fvuelo = $persona->fvuelo;
        $this->numerodevuelo = $persona->numerodevuelo;

        $this->abrirModal();
    }
}
