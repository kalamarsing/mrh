<?php

namespace App\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{

    protected $fillable = [
        'name',
        'phone',
        'holder_dni',
        'holder_name',
        'holder_address',
        'holder_phone',
        'contracted_service',
        'client_number',
        'notes',
        'property_id'
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'suppliers';
    
    public function property()
    {
        return $this->belongsTo('\App\Entities\Property');
    }



}
