<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldInvoiceNumber extends Model
{

    protected $table = 'num_factura';


    protected $fillable = [
        'num_facturaid',
        'numero',
        'any',
        'ordenation',
        'fecha',
        'usuarioid'
    ];

}
