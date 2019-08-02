<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mensajes_desaparecidos extends Model
{
protected $primaryKey = 'id';

protected $table = 'mensajes_desaparecidos';

protected $fillable = [
'id',
'mensaje',
'id_desaparecido',
'id_usuario_envia'
];

public $timestamps = false;

}
 