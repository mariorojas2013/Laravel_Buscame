@extends('layouts.layout')

@section('title')
   Bienvenido, Red Social para las personas desaparecidas
@stop
@section('content1')
                    <img src="{{ url('images/busFonTrans-10.png') }}" alt="" style="width: 189px;" />
                    @if ($comand == 'edit')
                    @else
                     <form method="post" action="{{ url('iniciar') }}">
                        {{ csrf_field() }}

                                    <div class="row gtr-uniform gtr-50">
                                        <div class="col-12"><input type="text" autocomplete="off" name="usuario" id="usuario" placeholder="Usuario" /><br>
                                        <input type="password" name="clave" autocomplete="off" id="clave" placeholder="Clave" /></div>
                                        <div class="col-12"> <input type="submit" name="" value="Iniciar Sesión"></div>
                                    </div>
                                </form>
                    @endif
                   
                                <div class="error"> 
                                   {{  Session::get('error') }}
                                </div>
@stop

@section('content2')
@if (isset($mensajes_user))
<br>
<h2>{{ $mensajes_user }}</h2>
<br>
Ahora Inicia Sesión!
<br>
<br>
@else

                            @if ($comand == 'edit')
                             <a href="{{ url('registro_des') }}" class="icon solid fa-arrow-left"> Volver</a>
                             <br>
                            <h3> Datos usuario</h3>
                             <form action="{{ url('save_edit_user') }}"  method="post">
                              {{ csrf_field() }}
                            @endif

                            @if ($comand == 'add')
                            <h3> Registrate ya!</h3>

                             <form action="{{ url('save_user') }}" method="post">
                              {{ csrf_field() }}
                            @endif
                             
                                
                           <div class="card" style="width: 24rem; margin: 10px;">
                              <div class="card-body">

                                <!-- <h4 style="color:#9e1842">DESAPARECIDO(A)</h4> -->
                              
                                <article class="col-12-xsmall work-item">
                                  @if (isset($id))
                                   <input type="hidden" name="id" value="{{$id}}">
                                  @endif
                                    

                                    <br>
                                    Tipo documento
                                    <select name="tipo_documento" id="tipo_documento" {{ ($comand=='ver'?'disabled':'') }}>
                                         <option value="CC">Cedula de Ciudadania</option> 
                                         <option value="TI">Tarjeta de identidad</option> 
                                         <option value="RC">Registro civil</option> 
                                         <option value="CE">Cedula Extranjeria</option> 
                                         <option value="PA">Pasaporte</option> 
                                    </select> 
                                    <br>
                                    Número de documento
                                    <input type="text" name="numero_documento" value="{{isset($pro)?$pro->numero_documento:''}}" {{ ($comand=='ver'?'ReadOnly="ReadOnly"':'') }}>
                                    <br>
                                    Nombres
                                    <input type="text" name="nombres" value="{{isset($pro)?$pro->nombres:''}}" {{ ($comand=='ver'?'ReadOnly="ReadOnly"':'') }}>
                                    <br>
                                    apellidos
                                    <input type="text" name="apellidos" value="{{isset($pro)?$pro->apellidos:''}}" {{ ($comand=='ver'?'ReadOnly="ReadOnly"':'') }}>
                                    <br>
                                    Ciudad de residencia
                                    <input type="text" name="ciudad_residencia" value="{{isset($pro)?$pro->ciudad_residencia:''}}" {{ ($comand=='ver'?'ReadOnly="ReadOnly"':'') }}>
                                    <br>
                                    Telefono fijo
                                    <input type="text" name="telefono_fijo" value="{{isset($pro)?$pro->telefono_fijo:''}}" {{ ($comand=='ver'?'ReadOnly="ReadOnly"':'') }}>
                                    <br>
                                    Celular
                                    <input type="text" name="celular" value="{{isset($pro)?$pro->celular:''}}" {{ ($comand=='ver'?'ReadOnly="ReadOnly"':'') }}>
                                    <br>
                                    Email
                                    <input type="text" name="email" value="{{isset($pro)?$pro->email:''}}" {{ ($comand=='ver'?'ReadOnly="ReadOnly"':'') }}>
                                    <br>
                                    Direccion
                                    <input type="text" name="direccion" value="{{isset($pro)?$pro->direccion:''}}" {{ ($comand=='ver'?'ReadOnly="ReadOnly"':'') }}>
                                    <br>
                                    Usuario
                                    <input type="text" name="usuario" value="{{isset($pro)?$pro->usuario:''}}" {{ ($comand=='ver'?'ReadOnly="ReadOnly"':'') }}>
                                    <br>
                                    Clave
                                    <input type="text" name="clave" value="{{isset($pro)?$pro->clave:''}}" {{ ($comand=='ver'?'ReadOnly="ReadOnly"':'') }}>
                                    <br>
                                    <br>
                                    <br>
                                    @if (isset($id))
                                       Filtros de busqueda
                                      <input type="text" name="filtros" value="{{isset($pro)?$pro->filtros:''}}" {{ ($comand=='ver'?'ReadOnly="ReadOnly"':'') }}>
                                      <br>
                                   @endif
                                    
                                    
                                </article>
                                @if ($comand == 'add' || $comand == 'edit')
                                        <input class="button solid primary " type="submit" name="" value="Guardar">
                                 @endif
                               
                              </div> 
                            </div>
                            </form>
@endif
                            
  @stop

@section('scriptPropio')

 
@stop


