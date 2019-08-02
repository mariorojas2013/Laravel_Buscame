@extends('layouts.layout')

@section('title')
Panel de busqueda  
@stop
@section('content1')
<style>
    .w-espe{
    width: 21rem;
    }
</style>
                    <img src="{{ url('images/busFonTrans-10.png') }}" alt="" style="width: 189px;" />
                            <h2>Red social de personas desaparecidas.</h2>
                             @if ($busqueda_tipo =='interna')
                            <a href="{{ url('busqueda') }}" class="icon solid fa-search"> Panel de busqueda</a>
                             @else
                            <a href="{{ url('registro_des') }}" class="icon solid fa-address-card"> Registro desaparecidos</a>
                            @endif

                     
@stop

@section('content2')

  <header class="major">
                            <h2>Busqueda: </h2>
                           
                           

                        </header>
                        <form method="post" action="#">
                                    <div class="row gtr-uniform gtr-50">
                                        <div class="col-12"><input type="text" name="usuario" id="usuario" placeholder="Buscar" /><br>
                                        
                                    </div>
                                </form>
                          
                            @if ($busqueda_tipo =='interna')
                                 <a href="{{ url('registro_add_desa') }}" class="icon solid fa-plus-circle fa-3"> Reportar persona desaparecida</a>


                                 
                            @endif
                 
                        <div class="row">

                        	@foreach ($datos as $per)
                         	 <div class="card w-espe" style=" margin: 10px;">
                              <div class="card-body">

                                <!-- <h4 style="color:#9e1842">DESAPARECIDO(A)</h4> -->
                                <h5 class="card-title">{{$per->nombres}} {{$per->apellidos}}</h5>
                                <article class="col-12-xsmall work-item">
                                  {{--   <a href="#" class="image fit thumb"><img src="{{
                                     url(  'images/publicaciones/thumbs/'.$per->numero_documento.'_1.png' )
                                      }}" alt="" /></a> --}}

                                      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                          <div class="carousel-inner">
                                            <div class="carousel-item active">
                                              <img class="d-block w-100" src="{{
                                     url(  'images/publicaciones/full/'.$per->numero_documento.'_1.png' )
                                      }}" alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                              <img class="d-block w-100" src="{{
                                     url(  'images/publicaciones/full/'.$per->numero_documento.'_2.png' )
                                      }}" alt="Second slide">
                                            </div>
                                            <div class="carousel-item">
                                              <img class="d-block w-100" src="{{
                                     url(  'images/publicaciones/full/'.$per->numero_documento.'_3.png' )
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
 
                                    <h3><span class="icon solid fa-calendar"></span> fecha de nacimiento: {{$per->fecha_nacimiento}}</h3>
                                    <h3><span class="icon solid fa-eye"></span> color de ojos: {{$per->color_ojos}} </h3>
                                    <h3><span class="icon solid fa-tint"></span> color de cabello: {{$per->color_cabello}} </h3>
                                    <h3><span class="icon solid fa-tint"></span> color de piel: {{$per->color_piel}} </h3>
                                    <h3><span class="icon solid fa-database"></span> peso promedio: {{$per->peso_promedio}} </h3>
                                    <h3><span class="icon solid fa-mars"></span> género: {{$per->genero}} </h3>
                                    <h3><span class="icon solid fa-arrow-up"></span> estatura: {{$per->estatura}} </h3>
                                    <h3><span class="icon solid fa-heartbeat"></span> enfermedades: {{$per->enfermedades}} </h3>
                                    <h3><span class="icon solid fa-map-marker"></span> última ubicación: {{$per->ultima_ubicacion}} </h3>
                                    <h3><span class="icon solid fa-retweet"></span> estado: {{$per->estado}} </h3>

                                    
                                   
                                </article>
                                @if ($busqueda_tipo =='interna')
                                    <ul class="icons">
                                        @if ($busqueda_tipo !='Revision')
                                            <li><a href="{{ url('editar_reg_desa') }}/{{$per->id_desaparecido}}" class="icon solid fa-pencil-square-o"> Editar</a></li>
                                        @endif
                                        @if ($busqueda_tipo !='Revision')
                                            @if ($busqueda_tipo =='Registro')
                                            <li><a href="{{ url('publicar_reg_desa') }}/{{$per->id_desaparecido}}" class="icon solid fa-cloud"> Publicar</a></li>
                                            @else
                                            <li><a href="{{ url('Qpublicar_reg_desa') }}/{{$per->id_desaparecido}}" class="icon solid fa-cloud"> Quitar Publicacion</a></li>
                                            @endif

                                        @endif
                                        @if ($busqueda_tipo !='Revision')
                                        <li><a href="{{ url('eliminar_reg_desa') }}/{{$per->id_desaparecido}}" class="icon solid fa-trash"> Eliminar</a></li>
                                        @endif
                                        @if ($busqueda_tipo !='Revision')
                                        <li><a href="{{ url('ver_mensajes_desa') }}/{{$per->id_desaparecido}}" class="icon solid fa-commenting"> Ver mensajes</a></li>
                                        @endif

                                    </ul>
                                
                                @else
                                <ul class="icons">
                                     <li><a href="{{ url('mas') }}/{{$per->id_desaparecido}}" class="icon solid fa-arrow-right"> Ver más</a></li>

                                     <li><a href="{{ url('mensajes') }}/{{$per->id_desaparecido}}" class="icon solid fa-commenting"> Enviar mensajes</a></li>
                                </ul>
                                @endif
                              </div> 
                            </div>
                        	@endforeach
                            <div class="MensajeRegistros" style='display:none'>
                                No se encontraron registros
                            </div>

 
                             
                        </div>
@stop

@section('scriptPropio')

 <script>
     $('#usuario').keyup(function () {
 
                    var rex = new RegExp($(this).val(), 'i');
                    $('.card').hide();
                    $('.MensajeRegistros').hide();

                    $('.card').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                    if($(".card").filter(":visible").length == 0 )
                    {
                        $('.MensajeRegistros').show();
                    }

                })


                @if (Session::get('nombres')=="")
                    window.location.href  ="{{ url('/') }}";
                @endif
          
 </script>
@stop