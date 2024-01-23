<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldProperty extends Model
{

    protected $table = 'piso';


    protected $fillable = [
        'pisoid',
        'nombre',
        'direccion',
        'propietario',
        'capacidad',
        'text',
        'clienteid',
        'numero',
        'cleanning',
        'checkin',
        'checkout',
        'shuttle_recogida',
        'shuttle_ida',
        'internet',
        'packid',
        'nombre_airbnb',
        'url_mapa',
        'cleanning_costo_mrh',
        'checkin_costo_mrh',
        'checkout_costo_mrh',
        'shuttle_recogida_costo_mrh',
        'shuttle_ida_costo_mrh',
        'internet_costo_mrh',
        'cesta',
        'cesta_costo_mrh',
        'parking',
        'parking_costo_mrh',
        'limpieza_sin_ropa_costo',
        'limpieza_con_ropa_costo',
        'limpieza_sin_ropa_precio',
        'limpieza_con_ropa_precio',
        'limpieza_tiempo',
        'asignado_default1',
        'asignado_default2',
        'asignado_default3',
        'inventario_file',
        'inventario_campo_aux',
        'num_licencia',
        'precio_minimo_reserva',
        'estado',
        'activo',
        'policia',
        'airbnb_listing_1',
        'airbnb_listing_2',
        'airbnb_listing_3',
        'airbnb_extras',
        'email_extras',
        'touristic_tax',
        'touristic_tax_value',
        'laundry_service',
        'laundry_address_comment',
        'laundry_pack_price'
    ];

}
