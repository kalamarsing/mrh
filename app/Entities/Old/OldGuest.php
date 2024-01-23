<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldGuest extends Model
{

    protected $table = 'huesped';


    protected $fillable = [
        'huespedid',
        'nombre',
        'apellido',
        'apellido2',
        'sexo',
        'tipo_documento',
        'num_documento',
        'fecha_expedicion',
        'nacionalidad',
        'fecha_nacimiento',
        'domicilio',
        'telefono',
        'file',
        'reservaid'
    ];

}
