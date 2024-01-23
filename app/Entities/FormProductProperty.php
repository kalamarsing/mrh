<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class PropertyFormProduct extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'form_product_id',
        'property_id'
    ];

    protected $table = 'property_form_products';

    public function formProduct()
    {
        return $this->belongsTo('\App\Entities\FormProduct');
    }

    public function property()
    {
        return $this->belongsTo('\App\Entities\Property');
    }


}
