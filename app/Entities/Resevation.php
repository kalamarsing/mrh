<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'booking_number',
        'host_name',
        'persons',
        'web',
        'date_in',
        'date_out',
        'days',
        'rental_income',
        'checkin',
        'checkin_price',
        'checkout',
        'checkout_price',
        'shuttle_pickup',
        'shuttle_pickup_price',
        'shuttle_return',
        'shuttle_return_price',
        'internet',
        'internet_price',
        'replacement_extras',
        'replacement_extras_price',
        'income_destination',
        'month',
        'resetvation_date',
        'property_id',
        'pack_id',
        'customer_id',
        'user_id',
        'cleanning',
        'cleanning_price',
        'comments',
        'passport',
        'file',
        'host_email',
        'host_phone',
        'reservation_code',
        'form_id',
        'form_status',
        'email_customer_status',
        'night_price',
        'basket',
        'basket_price',
        'parking',
        'parking_price',
        'mrh_cleanning_cost',
        'mrh_checkin_cost',
        'mrh_checkout_cost',
        'mrh_shuttle_pickup_cost',
        'mrh_shuttle_return_cost',
        'mrh_replacement_extras_cost',
        'mrh_basket_cost',
        'mrh_parking_cost',
        'checkin_time',
        'checkin_payment_status',
        'cleanning_payment_status',
        'checkout_time',
        'num_people_in_arrival_car',
        'num_people_in_return_car',
        'airbnb_total_nights',
        'airbnb_extras',
        'airbnb_service_fee',
        'cleanning_comments',
        'checkin_comments',
        'extras',
        'extras_price',
        'mrh_extras_cost',
        'touristic_tax',
        
    ];

    protected $table = 'reservations';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */



    public function property()
    {
        return $this->belongsTo('\App\Entities\Property');
    }

    public function pack()
    {
        return $this->belongsTo('\App\Entities\Pack');
    }

    public function user()
    {
        return $this->belongsTo('\App\Entities\User');
    }

    public function customer()
    {
        return $this->belongsTo('\App\Entities\Customer');
    }

    public function form()
    {
        return $this->belongsTo('\App\Entities\Form');
    }


    public function checkoutAssignations(): HasMany
    {
        return $this->hasMany('\App\Entities\CheckoutAssignation');
    }

    public function checkoinAssignations(): HasMany
    {
        return $this->hasMany('\App\Entities\CheckinAssignation');
    }

    public function incomes(): HasMany
    {
        return $this->hasMany('\App\Entities\Income');
    }

    public function guests(): HasMany
    {
        return $this->hasMany('\App\Entities\Guest');
    }

    public function reservation_files(): HasMany
    {
        return $this->hasMany('\App\Entities\ReservationFile');
    }
}
