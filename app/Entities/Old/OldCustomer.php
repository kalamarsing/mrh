<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldCustomer extends Model
{

    protected $table = 'cliente';


    protected $fillable = [
        'clienteid',
        'nombre',
        'apellido',
        'email',
        'password',
        'permisos',
        'dni',
        'telefono',
        'movil',
        'direccion',
        'cp',
        'poblacion',
        'pais',
        'cuenta',
        'banco',
        'direccion_banco',
        'swift_code',
        'imagen',
        'observaciones',
        'packid',
        'concepto_factura',
        'nombre_facturacion',
        'nif_facturacion',
        'direccion_facturacion',
        'cp_facturacion',
        'ciudad_facturacion',
        'pais_facturacion',
        'logo_facturacion',
        'importe_facturacion',
        'email_facturacion',
        'requiere_factura',
        'email2_facturacion',
        'activo',
        'fecha_alta',
        'fecha_baja',
        'fecha_cumpleanos',
        'other_phone',
        'estado',
        'estado_gen_password',
        'irpf',
        'iva',
        'email_nueva_reserva'
    ];


}
