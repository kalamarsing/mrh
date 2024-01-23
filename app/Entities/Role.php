<?php

namespace App\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    protected $fillable = [
        'name',
    ];
    
    public function roles(): HasMany
    {
        return $this->hasMany('\App\Entities\Role');
    }
}
