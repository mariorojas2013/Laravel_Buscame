@extends('layouts.layout')

@section('title')

   
@stop
@section('content1')
                    <img src="{{ url('images/busFonTrans-10.png') }}" alt="" style="width: 189px;" />
                            <h2>Red social de personas desaparecidas.</h2>
                    
@stop

@section('content2')
  <header class="major">
                            <h2>Red social de personas desaparecidas.</h2>
                        </header>
                        <form method="post" action="#">
                                    <div class="row gtr-uniform gtr-50">
                                        <div class="col-12"><input type="text" name="usuario" id="usuario" placeholder="Buscar" /><br>
                                        
                                    </div>
                                </form>
                          
                                      
                 
                        <div class="row">

                        	@foreach ($datos as $per)
                         	 <div class="card" style="width: 32rem; margin: 10px;">
                              <div class="card-body">
                                <h5 class="card-title">{{$per->nombres}} {{$per->apellidos}}</h5>
                                <article class="col-12-xsmall work-item">
                                    <a href="images/fulls/01.jpg" class="image fit thumb"><img src="images/thumbs/01.jpg" alt="" /></a>
                                    <h3>Magna sed consequat tempus</h3>
                                    <p>Lorem ipsum dolor sit amet nisl sed nullam feugiat.</p>
                                </article>
                                <ul class="icons">
                                    <li><a href="#" class="button primary icon solid fa-download">Icon</a></li>
                                    <li><a href="#" class="button icon solid fa-download">Icon</a></li>
                                    <li><a href="#" class="button icon solid fa-download">Icon</a></li>
                                    <li><a href="#" class="button icon solid fa-download">Icon</a></li>
                                </ul>
                                <ul class="icons">
                                    <li>
                                        <a href="#" class="icon brands fa-google"><span class="label">Twitter</span></a>
                                    </li>
                                    <li>
                                        <a href="#" class="icon brands fa-google"><span class="label">Twitter</span></a>
                                    </li>
                                        <li>
                                        <a href="#" class="icon brands fa-google"><span class="label">Twitter</span></a>
                                    </li>
                                        <li>
                                        <a href="#" class="icon brands fa-google"><span class="label">Twitter</span></a>
                                    </li>
                                </ul>


                                 
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