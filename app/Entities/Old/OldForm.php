<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldForm extends Model
{

    protected $table = 'form';


    protected $fillable = [
        'formid',
        'status',
        'fecha_enviado',
        'fecha_rellenado',
        'total',
        'anticipo',
        'restante',
        'metodo_pago',
        'status_pago',
        'pago_id',
        'llegada_tipo',
        'llegada_shuttle_requerido_ida',
        'llegada_numero_transporte',
        'llegada_terminal',
        'llegada_fecha',
        'llegada_procedencia',
        'llegada_destino',
        'llegada_num_personas_coche',
        'llegada_notas_coche',
        'llegada_shuttle_ida_vuelta',
        'total_shuttle',
        'llegada_parking_requerido',
        'total_parking',
        'checkin_time',
        'checkout_time',
        'notas',
        'reservaid',
        'llegada_compania_transporte',
        'comida_essential_pack',
        'comida_gourmet_pack',
        'comida_wine_pack',
        'comida_soft_pack',
        'comida_notas',
        'total_comida',
        'total_checkin_late',
        'estimated_time',
        'llegada_shuttle_requerido_vuelta',
        'departure_aeropuerto',
        'salida_numero_transporte',
        'salida_terminal',
        'salida_compania_transporte',
        'total_shuttle_ida',
        'total_shuttle_vuelta',
        'salida_fecha',
        'vuelta_num_personas_coche',
        'total_extras'
    ];


}
