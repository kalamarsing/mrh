<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldSupplier extends Model
{

    protected $table = 'proveedor';


    protected $fillable = [
        'proveedorid',
        'nombre_proveedor',
        'telefono_at_cliente',
        'dni_titular',
        'nombre_titular',
        'direccion_titular',
        'telefono_titular',
        'servicio_contratado',
        'numero_cliente',
        'notas',
        'pisoid'
    ];

}
