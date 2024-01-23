<?php

namespace App\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pack extends Model
{
    protected $fillable = [
        'name',
        'percent',
        'fixed'
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'packs';
    
    public function customers(): HasMany
    {
        return $this->hasMany('\App\Entities\Customer');
    }

    public function reservations(): HasMany
    {
        return $this->hasMany('\App\Entities\Reservation');
    }
}
