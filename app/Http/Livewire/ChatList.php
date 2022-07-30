<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use Livewire\Component;

class ChatList extends Component
{
    public $mensajes;

    public function render()
    {      
        $this->mensajes = Chat::orderBy("id", "asc")->take(10)->get();
        return view('livewire.chat-list');
    }

    public function delete($id){
        Chat::destroy($id);
    }
}
