<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class FormCategory extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'position',
        'active',
        'icon',
    ];

    protected $table = 'form_categories';


    public function formProducts(): HasMany
    {
        return $this->hasMany('\App\Entities\FormProduct');
    }
}
