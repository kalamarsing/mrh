<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Cleanning extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property_id',
        'mrh_cost',
        'customer_price',
        'type',
        'comment',
        'date',
        'hour',
        'month',
        'customer_id',
        'summary_comment'
    ];

    protected $table = 'cleannings';

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

}
