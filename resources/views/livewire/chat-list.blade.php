<div class="mt-3" >

    <h3><strong>Últimos 5 mensajes</strong></h3>    

    <div class="card" wire:poll>        
        <div class="overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light">
            @foreach($mensajes as $mensaje)        
                <div>
                    @if (Auth::user()->id==$mensaje->user_id)
                    <div class="alert alert-success h-20" style="margin-left: 30px;">
                        <button type="button" class="close" wire:click="delete({{ $mensaje->id }})">
                            <span aria-hidden="true">×</span>
                          </button>
                        <strong>{{ $mensaje->user->name }}</strong><small class="float-right">{{$mensaje["fecha"]}}</small>
                        <br><span class="text-muted">{{$mensaje["mensaje"]}}</span>
                        
                    </div>    
                    @else
                    <div class="alert alert-warning" style="margin-right: 50px;">
                        <strong>{{ $mensaje->user->name }}</strong><small class="float-right">{{$mensaje["fecha"]}}</small>
                        <br><span class="text-muted">{{$mensaje["mensaje"]}}</span>
                    </div>
                        
                    @endif             
                </div>        
            @endforeach 
        </div>
    </div>    

    <script>
        
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
  
        var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
            cluster: '{{env('PUSHER_APP_CLUSTER')}}',
            forceTLS: true
        });
        
        var channel = pusher.subscribe('chat-channel');
        
        channel.bind('chat-event', function(data) {            
            window.livewire.emit('mensajeRecibido', data);
        });
        
        setTimeout(function(){ window.livewire.emit('solicitaUsuario'); }, 100);
    </script>

</div>
