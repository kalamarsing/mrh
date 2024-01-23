<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldCleanningAssignation extends Model
{

    protected $table = 'asignacionl';


    protected $fillable = [
        'asignacionlid',
        'numero',
        'usuario',
        'limpiezaid',
        'estado',
        'campo1',
        'campo2'
    ];

}
