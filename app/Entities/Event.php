<?php

namespace App\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{

    protected $fillable = [
        'date',
        'title',
        'cost',
        'description',
        'attachment',
        'property_id',
        'user_id'
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'events';
    
    public function property()
    {
        return $this->belongsTo('\App\Entities\Property');
    }

    public function user()
    {
        return $this->belongsTo('\App\Entities\PrUseroperty');
    }

}
