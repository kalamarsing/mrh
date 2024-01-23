<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class ManteinanceActionAssignation extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'manteinance_action_id',
        'number',
        'status',
        'manteinance_action_confirmation_date',
        'customer_confitmation_date'
    ];

    protected $table = 'manteinance_action_assignations';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function user()
    {
        return $this->belongsTo('\App\Entities\User');
    }

    public function manteinanceAction()
    {
        return $this->belongsTo('\App\Entities\ManteinanceAction');
    }

}
