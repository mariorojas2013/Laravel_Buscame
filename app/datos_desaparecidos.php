<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datos_desaparecidos extends Model
{

protected $primaryKey = 'id_desaparecido';

protected $table = 'datos_desaparecidos';

protected $fillable = [
'id_desaparecido',
'foto1',
'foto2',
'foto3',
'tipo_documento',
'fecha_nacimiento',
'numero_documento',
'nombres',
'apellidos',
'color_ojos',
'color_cabello',
'color_piel',
'peso_promedio',
'genero',
'estatura',
'enfermedades',
'ultima_ubicacion',
'estado',
'id_usuario_admin'
];

public $timestamps = false;

}
 