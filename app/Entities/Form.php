<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'sent_at',
        'filled_at',
        'total',
        'advance',
        'remaining',
        'payment_method',
        'payment_status',
        'pago_id',
        'arrival_transport',
        'arrival_shuttle_required',
        'arrival_transport_number',
        'arrival_terminal',
        'arrival_date',
        'arrival_form',
        'arrival_destination_property',
        'arrival_shuttle_num_people',
        'arrival_shuttle_comments',
        'shuttle_total',
        'parking_required',
        'parking_total',
        'checkin_time',
        'checkout_time',
        'comments',
        'reservation_id',
        'arrival_transport_company',
        'food_essential_pack',
        'food_gourmet_pack',
        'food_wine_pack',
        'food_soft_pack',
        'food_comments',
        'food_total',
        'total_checkin_late',
        'property_arrival_estimated_time',
        'departure_shuttle_required',
        'departure_airport',
        'departure_transport_number',
        'departure_terminal',
        'departure_transport_company',
        'arrival_shuttle_total',
        'departure_shuttle_total',
        'departure_date',
        'departure_shuttle_num_people',
        'total_extras'
    ];

    protected $table = 'forms';



    public function reservation()
    {
        return $this->belongsTo('\App\Entities\Reservation');
    }

    public function buyedFormProducts(): HasMany
    {
        return $this->hasMany('\App\Entities\BuyedFormProduct');
    }

}
