<?php

namespace App\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PeriodicPropertyExpense extends Model
{

    protected $fillable = [
        'name',
        'quantity',
        'date',
        'mrh_cost',
        'january',
        'february',
        'march',
        'april',
        'may',
        'june',
        'july',
        'august',
        'september',
        'october',
        'november',
        'december',
        'property_id',
        'user_id'
    ];


    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'periodic_property_expenses';
    
    public function property()
    {
        return $this->belongsTo('\App\Entities\Property');
    }


    public function user()
    {
        return $this->belongsTo('\App\Entities\User');
    }
}
