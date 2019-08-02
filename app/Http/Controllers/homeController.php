<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuario_desaparecidos;
use App\datos_desaparecidos;
use App\mensajes_desaparecidos;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('inicio',['comand'=>'add']);
    }

     public function save_edit_user()
    {

        return view('inicio',['comand'=>'add']);

    }
     public function save_user(Request $request)
    {
        $datos = $request->all();
        $result = usuario_desaparecidos::create($datos); 
        return view('inicio',['comand'=>'add', 'mensajes_user'=>'La red Social BuscaMe le da la Bienvenida a '.$datos['nombres'] ." " . $datos['apellidos'] ]);

    }
     public function ver_user()
    {
        if(Session::get('id_user')!= "")
        {
           $usuario_datos = usuario_desaparecidos::where('id',Session::get('id_user'))->first();
           return view('inicio',['comand'=>'edit', 'mensajes_user'=>null, 'pro'=>$usuario_datos]); 
        }
        else
        {
            return view('inicio',['comand'=>'add']);
        }
        
    }
      public function cerrarSesion()
    {
        Session::flush();
        return view('inicio',['comand'=>'add']);

    } 


    public function enviar_mensaje(Request $request)
    {
        
        $datos = $request->all();
        $nombresSes = Session::get('nombres');

        $this->enviar_noti('El usuario '.$nombresSes . " le escribio : ".$datos['mensaje']);
        $result = mensajes_desaparecidos::create($datos); 
         return  $this->ver_mensajes_desa($datos['id_desaparecido']);
    }

     public function iniciar(Request $request)
    {
        $datos = $request->all();
        $usuario_desaparecidos = usuario_desaparecidos::where('usuario',$datos['usuario'])->where('clave',$datos['clave'])->count();
        $datos = usuario_desaparecidos::where('usuario',$datos['usuario'])->where('clave',$datos['clave'])->first();
        
        // print_r($datos);
        // die();
        if($usuario_desaparecidos)
        {
            //inicia Sesion

             Session::put('id_user',$datos['id']);
             Session::put('nombres',$datos['nombres'] . " ". $datos['apellidos']);
             Session::forget('error');
             return redirect('busqueda');


        }
        else
        {
             Session::put('error','Existe un problema con el usuario o clave');
            return view('inicio');
        }
    }
    public function mas($id_desaparecido)
    {
        $usuario_desaparecidos = datos_desaparecidos::where('id_desaparecido',$id_desaparecido)->first();
        return view('registro_desaparecido',['comand'=>'ver','pro'=>$usuario_desaparecidos,'id'=>$id_desaparecido]);
    }

    public function editar_reg_desa($id_desaparecido)
    {
         $usuario_desaparecidos = datos_desaparecidos::where('id_desaparecido',$id_desaparecido)->first();
        return view('registro_desaparecido',['comand'=>'edit','pro'=>$usuario_desaparecidos,'id'=>$id_desaparecido]);
    }
    public function registro_add_desa()
    {
         // $usuario_desaparecidos = datos_desaparecidos::where('id_desaparecido',$id_desaparecido)->get();
        
        return view('registro_desaparecido',['comand'=>'add','pro'=>null,'id'=>0]);
    }

    public function enviar_noti($texto)
    {

                        // Set POST variables
                        $url = 'https://fcm.googleapis.com/fcm/send';
 
                        $headers = array(
                            'Authorization: key=AAAAd14hTSk:APA91bHSZzbZv4ExPBk7S8q7Q9GpWZ0uYqfsXBuXHz6QMkdUffnSXO223k0QFBvS3LWcAhqvmsCXD5dkpCqDkUQdrlywwF4Ahvo3ojiWrcPL2sBQdSWTmq6rUBqs2X9K8jqBQgu8K1_L' ,
                            'Content-Type: application/json'
                        );
                        $datos = array(
                            "title"=> "Buscame",
                            "body"=> $texto,
                            // "click_action"=> "http://192.168.4.204/proyectos/otros/laravelbuscame/public",
                            "icon"=> "http://192.168.4.204/proyectos/otros/laravelbuscame/public/images/busFonTrans-10.png"
                        );

                        $fields = array(
                                'to' => "/topics/all",
                                'notification' => $datos,
                            );
                        
                        // Open connection
                        $ch = curl_init();
 
                        // Set the url, number of POST vars, POST data
                        curl_setopt($ch, CURLOPT_URL, $url);
 
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 0);
curl_setopt($ch, CURLOPT_PROXY, '192.168.100.1:3128');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

 
                        // Disabling SSL Certificate support temporarily
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
                        // Execute post
                        $result = curl_exec($ch);
                        if($result === FALSE){
                            die('Curl failed: ' . curl_error($ch));
                        }
 
                        // Close connection
                        curl_close($ch);
                        
                        // echo '<h2>Result</h2><hr/><h3>Request </h3><p><pre>';
                        // echo json_encode($fields,JSON_PRETTY_PRINT);
                        // echo '</pre></p><h3>Response </h3><p><pre>';
                        // echo $result;
                        // echo '</pre></p>';
    }

    public function save_edit_desa(Request $request)
    {
        $datos = $request->all();
        $saveDesaparecidos = datos_desaparecidos::findOrFail($datos['id_desaparecido']);
        $saveDesaparecidos->estado ='Registrado';
        $saveDesaparecidos->fill($datos);
        $saveDesaparecidos->save();

        if($saveDesaparecidos)
             Session::put('mensajes','Se actualizo');
         else
             Session::put('mensajes','Se guardo');

        return redirect('registro_des');
   }
    public function save_desa(Request $request)
    {
        $datos = $request->all();
        $datos['estado'] ='Registrado';
        $datos['id_usuario_admin'] = Session::get('id_user');
        $saveDesaparecidos = datos_desaparecidos::create($datos); 
        if($saveDesaparecidos)
             Session::put('mensajes','Se actualizo');
         else
             Session::put('mensajes','Se guardo');

        return redirect('registro_des');

    }

    public function ver_mensajes_desa($id_desaparecido)
    {
        $men=DB::select("select * from mensajes_desaparecidos a inner join usuario_desaparecidos b on (a.id_usuario_envia = b.id) WHERE id_desaparecido=".$id_desaparecido);
        $id_usuario_admin = Session::get('id_user');
        $nombresSes = Session::get('nombres');
        $datosDesaparecidos = datos_desaparecidos::findOrFail($id_desaparecido);
        $nombresDesaparecido = $datosDesaparecidos['nombres'] . " ". $datosDesaparecidos['apellidos'] ;
        
        return view('mensajes',['nombreDesa'=>$nombresDesaparecido,'nombres'=>$nombresSes, 'mensajes'=>$men,'id_desaparecido'=>$id_desaparecido,'id_usuario_envia'=>$id_usuario_admin]);
    }

    public function publicar_reg_desa($id_desaparecido)
    {
        $saveDesaparecidos = datos_desaparecidos::findOrFail($id_desaparecido);
        $saveDesaparecidos->estado = 'Revision';
        $saveDesaparecidos->save();
        return redirect('registro_des');
    }
        public function qpublicar_reg_desa($id_desaparecido)
    {
        $saveDesaparecidos = datos_desaparecidos::findOrFail($id_desaparecido);
        $saveDesaparecidos->estado = 'Registro';
        $saveDesaparecidos->save();
        return redirect('registro_des');
    }

    public function eliminar_reg_desa($id_desaparecido)
    {
        $saveDesaparecidos = datos_desaparecidos::findOrFail($id_desaparecido);
        $saveDesaparecidos->estado = 'Eliminado';
        $saveDesaparecidos->save();
        return redirect('registro_des');
    }

     public function busqueda()
    {


        $datos_desaparecidos = datos_desaparecidos::where('estado','Publicado')->select('datos_desaparecidos.id_desaparecido',
'datos_desaparecidos.foto1',
'datos_desaparecidos.foto2',
'datos_desaparecidos.foto3',
'datos_desaparecidos.tipo_documento',
'datos_desaparecidos.fecha_nacimiento',
'datos_desaparecidos.numero_documento',
'datos_desaparecidos.nombres',
'datos_desaparecidos.apellidos',
'datos_desaparecidos.color_ojos',
'datos_desaparecidos.color_cabello',
'datos_desaparecidos.color_piel',
'datos_desaparecidos.peso_promedio',
'datos_desaparecidos.genero',
'datos_desaparecidos.estatura',
'datos_desaparecidos.enfermedades',
'datos_desaparecidos.ultima_ubicacion',
'datos_desaparecidos.estado',
'datos_desaparecidos.id_usuario_admin')->join('usuario_desaparecidos', 'usuario_desaparecidos.id', '=', 'datos_desaparecidos.id_usuario_admin')->get();

        return view('busqueda',['datos'=>$datos_desaparecidos,'busqueda_tipo'=>'externa']);
    }

     public function mensajes($id_desaparecido)
    {
         $men=DB::select("select * from mensajes_desaparecidos a inner join usuario_desaparecidos b on (a.id_usuario_envia = b.id) WHERE id_desaparecido=".$id_desaparecido);
        $datosDesaparecidos = datos_desaparecidos::findOrFail($id_desaparecido);

        $nombresSes = Session::get('nombres');
        $nombresDesaparecido = $datosDesaparecidos['nombres'] . " ". $datosDesaparecidos['apellidos'] ;
        $id_usuario_admin = Session::get('id_user');

        return view('mensajes',['nombreDesa'=>$nombresDesaparecido,'nombres'=>$nombresSes,'mensajes'=>$men,'id_desaparecido'=>$id_desaparecido,'id_usuario_envia'=>$id_usuario_admin]);
    }
    public function registro_des()
    {
        $datos_desaparecidos = datos_desaparecidos::select('datos_desaparecidos.id_desaparecido',
'datos_desaparecidos.foto1',
'datos_desaparecidos.foto2',
'datos_desaparecidos.foto3',
'datos_desaparecidos.tipo_documento',
'datos_desaparecidos.fecha_nacimiento',
'datos_desaparecidos.numero_documento',
'datos_desaparecidos.nombres',
'datos_desaparecidos.apellidos',
'datos_desaparecidos.color_ojos',
'datos_desaparecidos.color_cabello',
'datos_desaparecidos.color_piel',
'datos_desaparecidos.peso_promedio',
'datos_desaparecidos.genero',
'datos_desaparecidos.estatura',
'datos_desaparecidos.enfermedades',
'datos_desaparecidos.ultima_ubicacion',
'datos_desaparecidos.estado',
'datos_desaparecidos.id_usuario_admin')->join('usuario_desaparecidos', 'usuario_desaparecidos.id', '=', 'datos_desaparecidos.id_usuario_admin')->where('datos_desaparecidos.id_usuario_admin',Session::get('id_user'))->get();

        return view('busqueda',['datos'=>$datos_desaparecidos,'busqueda_tipo'=>'interna']);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
