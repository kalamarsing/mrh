<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class FormProduct extends Model
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
        'file',
        'form_category_id',
        'price',
        'active',
        'cost',
        'more_info',
        'parent_id'
    ];

    protected $table = 'form_products';



    public function formCategory()
    {
        return $this->belongsTo('\App\Entities\FormCategory');
    }

    public function buyedFormProducts(): HasMany
    {
        return $this->hasMany('\App\Entities\BuyedFormProduct');
    }

    public function parent()
    {
    	return $this->hasOne('App\Entities\FormProducto', 'id', 'parent_id');
    }

}
