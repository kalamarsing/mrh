<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'concept',
        'amount',
        'date',
        'month',
        'customer_id',
        'user_id',
        'reservation_id',
        'property_id'
    ];


    protected $table = 'incomes';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function property()
    {
        return $this->belongsTo('\App\Entities\Property');
    }

    public function customer()
    {
        return $this->belongsTo('\App\Entities\Customer');
    }

    public function reservation()
    {
        return $this->belongsTo('\App\Entities\Reservation');
    }

    public function user()
    {
        return $this->belongsTo('\App\Entities\User');
    }
}
