<?php

namespace App\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PropertyItem extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'date',
        'notes',
        'description',
        'price',
        'position',
        'status',
        'attachment',
        'category',
        'property_id',
        'user_id'
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'property_items';

    public function user()
    {
        $this->belongsToMany('\App\Entities\User');
    }
    
    public function properties()
    {
        $this->belongsToMany('\App\Entities\Property');
    }
 
}
