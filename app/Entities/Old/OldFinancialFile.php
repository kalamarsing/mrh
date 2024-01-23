<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldFinancialFile extends Model
{

    protected $table = 'fichero';


    protected $fillable = [
        'ficheroid',
        'tipo',
        'mes',
        'clienteid',
        'filename',
        'usuarioid',
        'fecha_generacion',
        'concepto_factura',
        'campo1',
        'campo2',
        'campo3',
        'fecha_enviado',
        'fecha_cobrado',
        'fecha_factura',
        'status',
        'total',
        'observaciones',
        'num_facturaid'
    ];

}
