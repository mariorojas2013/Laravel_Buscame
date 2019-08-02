@extends('layouts.layout')

@section('title')
Registro
@stop
@section('content1')
                    <img src="{{ url('images/busFonTrans-10.png') }}" alt="" style="width: 189px;" />
                            <h2>Red social de personas desaparecidas.</h2>
                            @if ($comand == 'edit')
                             Editando
                            @endif

                            @if ($comand == 'add')
                             Agregando
                            @endif

                            @if ($comand == 'ver')
                             Ver mas
                            @endif
@stop

@section('content2')
  <header class="major">
                            <h2>Datos persona desaparecida.</h2>
                                <a href="{{ url('registro_des') }}" class="icon solid fa-arrow-left"> Volver</a>
                            
                        </header>
                      
                        <div class="row">

                        	{{-- @foreach ($propios as $pro) --}}

                            @if ($comand == 'edit')
                             <form action="{{ url('save_edit_desa') }}"  method="post">
                            @endif

                            @if ($comand == 'add')
                             <form action="{{ url('save_desa') }}" method="post">
                            @endif
                             {{ csrf_field() }}
                                
                         	 <div class="card" style="width: 24rem; margin: 10px;">
                              <div class="card-body">

                                <!-- <h4 style="color:#9e1842">DESAPARECIDO(A)</h4> -->
                              
                                <article class="col-12-xsmall work-item">
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                          <div class="carousel-inner">
                                            <div class="carousel-item active">
                                              <img class="d-block w-100" src="{{
                                     url(  'images/publicaciones/full/'.$pro->numero_documento.'_1.png' )
                                      }}" alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                              <img class="d-block w-100" src="{{
                                     url(  'images/publicaciones/full/'.$pro->numero_documento.'_2.png' )
                                      }}" alt="Second slide">
                                            </div>
                                            <div class="carousel-item">
                                              <img class="d-block w-100" src="{{
                                     url(  'images/publicaciones/full/'.$pro->numero_documento.'_3.png' )
                                      }}" alt="Third slide">
                                            </div>
                                          </div>
                                          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                          </a>
                                          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                          </a>
                                        </div>

                                    <input type="hidden" name="id_desaparecido" value="{{$id}}">
                                    

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
                                    Fecha de nacimiento <br>
                                    <input type="date" name="fecha_nacimiento" format="yyyy-MM-dd" style='width: 100%; border-radius: 10px;padding: 6px;'  value="{{isset($pro)?$pro->fecha_nacimiento:''}}" {{ ($comand=='ver'?'ReadOnly="ReadOnly"':'') }}>
                                    <br>
                                    Color de ojos
                                    <input type="text" name="color_ojos" value="{{isset($pro)?$pro->color_ojos:''}}" {{ ($comand=='ver'?'ReadOnly="ReadOnly"':'') }}>
                                    <br>
                                    Color de cabello
                                    <input type="text" name="color_cabello" value="{{isset($pro)?$pro->color_cabello:''}}" {{ ($comand=='ver'?'ReadOnly="ReadOnly"':'') }}>
                                    <br>
                                    Color de piel
                                    <input type="text" name="color_piel" value="{{isset($pro)?$pro->color_piel:''}}" {{ ($comand=='ver'?'ReadOnly="ReadOnly"':'') }}>
                                                                        <br>
                                    Peso promedio
                                    <input type="text" name="peso_promedio" value="{{isset($pro)?$pro->peso_promedio:''}}" {{ ($comand=='ver'?'ReadOnly="ReadOnly"':'') }}>
                                                                        <br>
                                    Genero
                                    <select name="genero" id="genero" {{ ($comand=='ver'?'disabled':'') }}>
                                         <option value="M">Masculino</option> 
                                         <option value="F">Femenino</option> 
                                         <option value="ND">No definido</option> 
                                    </select> 
                                                                        <br>
                                    Estatura
                                    <input type="text" name="estatura" value="{{isset($pro)?$pro->estatura:''}}" {{ ($comand=='ver'?'ReadOnly="ReadOnly"':'') }}>
                                                                        <br>
                                    Enfermedades
                                    <input type="text" name="enfermedades" value="{{isset($pro)?$pro->enfermedades:''}}" {{ ($comand=='ver'?'ReadOnly="ReadOnly"':'') }}>
                                                                        <br>
                                    Última ubicación
                                    <input type="text" name="ultima_ubicacion" value="{{isset($pro)?$pro->ultima_ubicacion:''}}" {{ ($comand=='ver'?'ReadOnly="ReadOnly"':'') }}>
                                    <div id="map-canvas"></div>
                                                                        <br>
                                    Estado
                                     <h3>{{isset($pro)?$pro->estado:''}}</h3>

                                     
                                    
                                </article>
                                @if ($comand == 'add' || $comand == 'edit')
                                        <input class="button solid primary " type="submit" name="" value="Guardar">
                                 @endif
                               
                              </div> 
                            </div>
                            </form>
                        	{{-- @endforeach --}}

 
                             
                        </div>
@stop

@section('scriptPropio')
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>
    @if ($pro)
    $("#tipo_documento").val('{{isset($pro)?$pro->tipo_documento:''}}').change();
    $("#genero").val('{{isset($pro)?$pro->genero:''}}').change();

    @endif

function initialize() {

    var myLatLng = new google.maps.LatLng({{ $pro->ultima_ubicacion }}),
        myOptions = {
            zoom: 15,
            center: myLatLng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        },
        map = new google.maps.Map(document.getElementById('map-canvas'), myOptions),
        marker = new google.maps.Marker({
            position: myLatLng,
            map: map
        });

    marker.setMap(map);
    moveMarker(map, marker);

}

function moveMarker(map, marker) {

    //delayed so you can see it move
    setTimeout(function () {

        marker.setPosition(new google.maps.LatLng({{ $pro->ultima_ubicacion }}));
        map.panTo(new google.maps.LatLng({{ $pro->ultima_ubicacion }}));

    }, 1500);

};

initialize();

 @if (Session::get('nombres')=="")
                    window.location.href  ="{{ url('/') }}";
                @endif
</script>
 
@stop