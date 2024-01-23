<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class BuyedFormProduct extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'form_product_id',
        'price',
        'cost',
        'form_id',
        'subproduct' 
    ];

    protected $table = 'buyed_form_products';



    public function form()
    {
        return $this->belongsTo('\App\Entities\Form');
    }

    public function formProduct()
    {
        return $this->belongsTo('\App\Entities\FormProduct');
    }

    public function subProduct()
    {
        return $this->hasOne('App\Entities\BuyedFormProduct', 'id', 'subproduct');
    }


}
