<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldManteinanceActionAssignation extends Model
{

    protected $table = 'asignacionm';


    protected $fillable = [
            'asignacionmid',
            'numero',
            'usuarioid',
            'mantenimientoid',
            'campo1',
            'campo2',
            'estado' ,
            'fecha_aceptacion_mantenimiento',
            'fecha_aceptacion_cliente'
    ];

}
