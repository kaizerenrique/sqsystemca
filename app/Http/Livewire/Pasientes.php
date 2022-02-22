<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Persona;
use Livewire\WithPagination;
use Illuminate\Support\Str;


class Pasientes extends Component
{
    
    public $article;
    public $reg;
    public $confirmingArticleAdd = false;
    public $confirmingArticleCode = false;

    protected $rules = [
        'article.nombre' => 'require|string|min:4',
        'article.apellido' => 'require|string|min:4',
        'article.cedula' => 'string|min:6',
        'article.pasaporte' => 'string|min:4',
        'article.fnacimiento' => 'date',
        'article.nrotelefono' => 'string|min:12|max:15',
        'article.email' => 'email',
        'article.direccion' => 'string|min:8|max:200',
        'article.destinovuela' => 'string|min:4|max:80',
        'article.fvuelo' => 'date',
        'article.numerodevuelo' => 'string|min:4|max:30',
    ];

    public function confirmArticleAdd ()
    {
        $this->reset(['article']);
        $this->confirmingArticleAdd = true;
    }

    public function saveArticle()
    {
        //$this->validate();
        
        $lap = 2;
            do {
                $code = Str::random(7);    
            } while (Persona::where('idusuario', $code)->exists());
            
            $reg = auth()->user()->personas()->create([
                'lap' => $lap,
                'idusuario' => $code,           
                'nombre' => $this->article['nombre'],
                'apellido' => $this->article['apellido'],
                'cedula' => $this->article['cedula'] ?? null,
                'pasaporte' => $this->article['pasaporte'] ?? null,
                'fnacimiento' => $this->article['fnacimiento'],
                'nrotelefono' => $this->article['nrotelefono'] ?? null,
                'email' => $this->article['email'] ?? null,
                'direccion' => $this->article['direccion'],
                'destinovuela' => $this->article['destinovuela'],
                'fvuelo' => $this->article['fvuelo'],
                'numerodevuelo' => $this->article['numerodevuelo']
            ]);
        
        
        $this->confirmingArticleAdd = false;

        //dd($article);
        $this->render($reg);
        
        
    }

    public function render()
    {
        //$personas = Persona::where('user_id', auth()->user()->id)
        
        $data = Persona::latest('id')->first();     
        

        return view('livewire.pasientes',[
            'data' => $data,
        ]);
    }


    
}
