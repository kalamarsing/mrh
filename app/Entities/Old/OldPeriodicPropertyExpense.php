<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldPeriodicPropertyExpense extends Model
{

    protected $table = 'pgasto';


    protected $fillable = [
        'pgastoid',
        'nombre',
        'cantidad',
        'fecha',
        'costo_mrh',
        'enero',
        'febrero',
        'marzo',
        'abril',
        'mayo',
        'junio',
        'julio',
        'agosto',
        'septiembre',
        'octubre',
        'noviembre',
        'diciembre',
        'pisoid',
        'usuarioid'
    ];

}
