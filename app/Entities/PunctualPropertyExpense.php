<?php

namespace App\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PunctualPropertyExpense extends Model
{

    protected $fillable = [
        'concept',
        'quantity',
        'date',
        'mrh_cost',
        'month',
        'file',
        'property_id',
        'user_id'
    ];

    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'punctual_property_expenses';
    
    public function property()
    {
        return $this->belongsTo('\App\Entities\Property');
    }


    public function user()
    {
        return $this->belongsTo('\App\Entities\User');
    }
}
