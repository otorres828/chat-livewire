<div class="">

    <a href="/" style="color: black;">
        <h5 class="pb-0 mb-0"><strong>Comunicacion entre varios computadores mediante chat live</strong></h5>
        <h2 class="pt-0 mt-0"><strong>Proyecto Redes 2</strong></h2>
    </a>

    <!-- El Usuario -->
    <div class="form-group">
        <label for="usuario"><strong>Usuario</strong></label>
        <input 
            type="text" 
           
            class="form-control" 
            value="{{Auth::user()->name}}" readonly>                
        
        <!-- Validación -->
        @error("usuario") 
            <small class="text-danger">{{ $message }}</small> 
        @else 
            <small readonly class="text-muted">Tu nombre: {{Auth::user()->name}}</small> 
        @enderror
    </div>

    <!-- Mensaje de Chat a Enviar -->
    <div class="form-group">
        <label for="mensaje"><strong>Mensaje</strong></label>
        <input type="text" 
            wire:model="mensaje" 
            class="form-control" 
            placeholder="escribe algo para tu mensaje">
        
        <!-- Validación -->
        @error("mensaje") 
            <small class="text-danger" placeholder="escribe algo para tu mensaje"></small> 
        @else 
            <small class="text-muted">Escribe tu mensaje y teclea <code>ENTER</code> para enviarlo</small> 
        @enderror
    </div>
        
    <div wire:offline class="alert alert-danger text-center">
        <strong>Se ha perdido la conexión a Internet</strong>
    </div>
    
    <div class="row">
        <div class="col-6">
            <!-- Mensajes de alerta -->    
            <div style="position: absolute;"
            class="alert alert-success collapse" 
            role="alert" 
            id="avisoSuccess"       
            >Se ha enviado</div>        
        </div>    
        <div class="col-6 pt-2 text-right">
            <button 
                class="btn btn-primary" 
                wire:click="enviarMensaje"
                wire:loading.attr="disabled"
                wire:offline.attr="disabled"            
            >Enviar Mensaje</button>
        </div> 
        
        <div>
            <h3 class="text-success font-bold pt-3">Autores del proyecto:</h3>
            <ul>
                <li>Arturo Canga</li>
                <li>Ricargo Rolina</li>
                <li>Alfonzo Jesus</li>
                <li>Oliver Torres</li>
            </ul>
            <h3 class="text-success font-bold pt-3">El mejor profesor de Redes:</h3>
            <ul>
                <li>Romel Silva</li>
            </ul>

        </div>
    </div>
    
    <script>
                 
        // Esto lo recibimos en JS cuando lo emite el componente
        // El evento "enviadoOK"
        $( document ).ready(function() {
            window.livewire.on('enviadoOK', function () {
                $("#avisoSuccess").fadeIn("slow");                
                setTimeout(function(){ $("#avisoSuccess").fadeOut("slow"); }, 3000);                                
            });
        });
        
    </script>

</div>
