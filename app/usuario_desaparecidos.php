<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario_desaparecidos extends Model
{

protected $table = 'usuario_desaparecidos';

protected $fillable = ['id',
'tipo_documento',
'numero_documento',
'nombres',
'apellidos',
'ciudad_residencia',
'telefono_fijo',
'celular',
'email',
'direccion',
'filtros',
'usuario',
'clave'];

public $timestamps = false;


}
