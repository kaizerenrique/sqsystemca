<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Persona;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Personas extends Component
{
    use WithPagination;

    //variables
    public $buscar;
    public $persona;

    public $confirmingPersonaDeletion = false; 
    public $confirmingPersonaAdd = false; 
    public $confirmingPersonaVer = false;



    protected $queryString = [
        'buscar' => ['except' => '']
    ];

    protected $rules = [
        'persona.nombre' => 'require|string|min:4',
        'persona.apellido' => 'require|string|min:4',
        'persona.cedula' => 'string|min:6',
        'persona.pasaporte' => 'string|min:4',
        'persona.fnacimiento' => 'date',
        'persona.nrotelefono' => 'string|min:12|max:15',
        'persona.email' => 'email',
        'persona.direccion' => 'string|min:8|max:200',
        'persona.destinovuela' => 'string|min:4|max:80',
        'persona.fvuelo' => 'date',
        'persona.numerodevuelo' => 'string|min:4|max:30',
    ];

    public function render()
    {
        //$personas = Persona::where('user_id', auth()->user()->id)
        $lab = 5;
        $personas = Persona::where('lap', $lab)
                    ->when($this->buscar, function($query){
                        return $query->where(function ($query){
                            $query->where('nombre', 'like', '%'.$this->buscar . '%')
                                ->orWhere('apellido', 'like', '%'.$this->buscar . '%')
                                ->orWhere('cedula', 'like', '%'.$this->buscar . '%')
                                ->orWhere('pasaporte', 'like', '%'.$this->buscar . '%')
                                ->orWhere('idusuario', 'like', '%'.$this->buscar . '%')
                                ->orWhere('nrotelefono', 'like', '%'.$this->buscar . '%')
                                ->orWhere('email', 'like', '%'.$this->buscar . '%')
                                ->orWhere('direccion', 'like', '%'.$this->buscar . '%');
                        });
                    });

        $personas = $personas->paginate(9);
        

        return view('livewire.personas',[
            'personas' => $personas,
        ]);
    }

    public function updatingBuscar()
    {
        $this->resetPage();
    }

    //------------------------------------------------
    // Modal de confirmacion para eliminar usuario
    public function confirmPersonaDeletion ($id)
    {
        $this->confirmingPersonaDeletion = $id;
    }

    // Eliminar Usuario
    public function deletePersona (Persona $persona)
    {
        $persona->delete();
        $this->confirmingPersonaDeletion = false;
    }
    //------------------------------------------------
    
    //------------------------------------------------
    // Modal para agregar usuario
    public function confirmPersonaAdd ()
    {   
        $this->reset(['persona']);
        $this->confirmingPersonaAdd = true;
    }

    public function savePersona()
    {
        //$this->validate();
        if (isset($this->persona->id)) {
            $this->persona->save();
        } else {
            do {
                $code = Str::random(7);    
            } while (Persona::where('idusuario', $code)->exists());
            
            auth()->user()->personas()->create([ 
                'idusuario' => $code,           
                'nombre' => $this->persona['nombre'],
                'apellido' => $this->persona['apellido'],
                'cedula' => $this->persona['cedula'] ?? null,
                'pasaporte' => $this->persona['pasaporte'] ?? null,
                'fnacimiento' => $this->persona['fnacimiento'],
                'nrotelefono' => $this->persona['nrotelefono'] ?? null,
                'email' => $this->persona['email'] ?? null,
                'direccion' => $this->persona['direccion'],
                'destinovuela' => $this->persona['destinovuela'],
                'fvuelo' => $this->persona['fvuelo'],
                'numerodevuelo' => $this->persona['numerodevuelo']
            ]);
        }
        
        $this->confirmingPersonaAdd = false;
    }

    //------------------------------------------------
    //Editar Registro

    public function confirmPersonaEditar(Persona $persona)
    {
        $this->persona = $persona;
        $this->confirmingPersonaAdd = true;
    }


    public function confirmPersonaVer(Persona $persona)
    {
        $this->persona = $persona;
        $this->confirmingPersonaVer = true;
    }
    

}
