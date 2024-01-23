<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class CleanningAssignation extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number',
        'user_id',
        'cleanning_id',
        'status'
        
    ];


    protected $table = 'cleanning_assignations';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function cleanning()
    {
        return $this->belongsTo('\App\Entities\Cleanning');
    }

    public function user()
    {
        return $this->belongsTo('\App\Entities\User');
    }

    public function laundry()
    {
        return $this->belongsTo('\App\Entities\User');
    }

}
