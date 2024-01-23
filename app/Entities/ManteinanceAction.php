<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class ManteinanceAction extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property_id',
        'customer_id',
        'material_cost',
        'labour_cost',
        'customer_price',
        'name',
        'description',
        'init_date',
        'init_time',
        'month',
        'mrh_total',
        'end_date',
        'end_time',
        'notes',
        'position',
        'status',
        'file_1',
        'file_2',
        'file_3',
        'file_4',
        'file_5',
        'type_1',
        'type_2',
        'type_3',
        'type_4',
        'type_5',
        'payment_status',
        'advance',
        'confirmation_email_required'
    ];

    protected $table = 'manteinance_actions';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function property()
    {
        return $this->belongsTo('\App\Entities\Reservation');
    }

    public function customer()
    {
        return $this->belongsTo('\App\Entities\Customer');
    }

}
