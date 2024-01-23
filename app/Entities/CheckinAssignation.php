<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class CheckinAssignation extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number',
        'user_id',
        'reservation_id',
        'status'
        
    ];

    protected $table = 'checkin_assignations';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function reservation()
    {
        return $this->belongsTo('\App\Entities\Reservation');
    }

    public function user()
    {
        return $this->belongsTo('\App\Entities\User');
    }

}
