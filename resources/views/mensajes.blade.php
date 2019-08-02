@extends('layouts.layout')

@section('title')
Mensajes
@stop
@section('content1')
                    <img src="{{ url('images/busFonTrans-10.png') }}" alt="" style="width: 189px;" />
                            <h2>Red social de personas desaparecidas.</h2>
                            <h1>Mensajes.</h1>
                    
@stop

@section('content2')
  <header class="major">
                        </header>
                                 
                                <a href="{{ url('registro_des') }}" class="icon solid fa-arrow-left"> Volver</a>
                 <h3 style="color:#9e1842">Desaparecido : {{$nombreDesa}}</h3>
                                <br>
                        <div class="row">
                             <div class="card" style="width: 24rem; margin: 10px;">
                              <div class="card-body">
                                



                                <h4 style="color:#9e1842">Enviar mensajes</h4>
                                
                                <article class="col-12-xsmall work-item">
                                   <form method="post" action="{{ url('enviar_mensaje') }}">
                                    {{ csrf_field() }}

                                    <div class="row gtr-uniform gtr-50">
                                        <div class="col-12">
                                          <input type="text" name="mensaje" id="mensaje" placeholder="mensaje..." />
                                          <input type="hidden" name="id_desaparecido" value="{{ $id_desaparecido }}" />
                                          <input type="hidden" name="id_usuario_envia" value="{{ $id_usuario_envia }}" />
                                          <br>
                                        <div class="col-12"> <input type="submit" name="" value="Enviar"></div>
                                    </div>
                                </form> 
                                </article>
                                 
                              </div> 
                            </div>
                        	@foreach ($mensajes as $men)
                         	 <div class="card" style="width: 24rem; margin: 10px;">
                              <div class="card-body">
                                <h5 class="card-title">Mensaje enviado por {{$men->nombres}} {{$men->apellidos}}</h5>
                                <article class="col-12-xsmall work-item">
                                    <h2><span class="icon solid fa-commenting"></span>{{$men->mensaje}}</h2>
                                </article>
                                
                              </div> 
                            </div>
                        	@endforeach

 
                             
                        </div>
@stop

@section('scriptPropio')
<script>
   @if (Session::get('nombres')=="")
                    window.location.href  ="{{ url('/') }}";
                @endif
</script>
 
@stop