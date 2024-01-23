<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldChecknAssignation extends Model
{

    protected $table = 'asignacion';


    protected $fillable = [
        'asignacionid',
        'numero',
        'usuario',
        'reserva',
        'estado'
    ];


}
