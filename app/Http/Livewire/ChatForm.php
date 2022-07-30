<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Events\NuevoMensaje;
use App\Models\Chat;
use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Facades\Auth;

class ChatForm  extends Component
{

    public $usuario;
    public $mensaje;

    protected $updatesQueryString = ['usuario'];   
    

    // Se produce cuando se actualiza cualquier dato por Binding
    public function updated($field)
    {
        // Solo validamos el campo que genera el update
        $validatedData = $this->validateOnly($field, [
            'mensaje' => 'required',
        ]);
    }

    public function enviarMensaje()
    {                
        $validatedData = $this->validate([
            'mensaje' => 'required',
        ]);

        // Guardamos el mensaje en la BBDD
        Chat::create([
            "usuario" =>Auth::user()->name,
            "mensaje" => $this->mensaje,
            "user_id"=>Auth::user()->id
        ]);
        $datos=[
            "usuario" => Auth::user()->name,
            "mensaje" => $this->mensaje,
            "user_id"=>Auth::user()->id
        ];

        $this->emit('enviadoOK', $this->mensaje);
        event(new NuevoMensaje($this->usuario, $this->mensaje));
        // Creamos un nuevo texto aleatorio (para el próximo mensaje)
    
    }    

    public function render()
    {
        return view('livewire.chat-form');
    }
}

