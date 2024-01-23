<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldReservation extends Model
{

    protected $table = 'reserva';


    protected $fillable = [
        'reservaid',
        'num_reserva',
        'host_name',
        'num_personas',
        'web',
        'fecha_in',
        'fecha_out',
        'dias',
        'rental_income',
        'checkin',
        'checkin_precio',
        'checkout',
        'checkout_precio',
        'shuttle_recogida',
        'shuttle_recogida_precio',
        'shuttle_ida',
        'shuttle_ida_precio',
        'internet',
        'internet_precio',
        'replacement_extras',
        'replacement_extras_precio',
        'income_destination',
        'mes',
        'fecha_reserva',
        'pisoid',
        'packid',
        'clienteid',
        'usuarioid',
        'cleanning',
        'cleanning_precio',
        'observaciones',
        'pasaporte',
        'file',
        'host_email',
        'host_phone',
        'reserva_code',
        'formid',
        'form_status',
        'email_cliente_status',
        'precio_noche',
        'cesta',
        'cesta_precio',
        'parking',
        'parking_precio',
        'cleanning_costo_mrh',
        'checkin_costo_mrh',
        'checkout_costo_mrh',
        'shuttle_recogida_costo_mrh',
        'shuttle_ida_costo_mrh',
        'replacement_extras_costo_mrh',
        'cesta_costo_mrh',
        'parking_costo_mrh',
        'checkin_time',
        'observaciones_cin',
        'checkin_estado_pago',
        'cleanning_estado_pago',
        'checkout_time',
        'llegada_num_personas_coche',
        'vuelta_num_personas_coche',
        'airbnb_total_nights',
        'airbnb_extras',
        'airbnb_service_fee',
        'notas_limpieza',
        'notas_checkin',
        'extras',
        'extras_precio',
        'extras_costo_mrh',
        'touristic_tax'
    ];


}
