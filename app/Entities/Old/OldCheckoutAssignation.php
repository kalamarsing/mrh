<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldCheckoutAssignation extends Model
{

    protected $table = 'asignacionc';


    protected $fillable = [
        'asignacioncid',
        'numero',
        'usuario',
        'reserva',
        'estado',
        'laundryid',
        'delivery_time_init',
        'delivery_time_end',
        'delivery_price',
        'delivery_amenities',
        'delivery_notes'
    ];


}
