<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldBuyedFormProduct extends Model
{

    protected $table = 'formproductobuyed';


    protected $fillable = [
        'formproductobuyedid',
        'formproductoid',
        'price',
        'cost',
        'extra1',
        'extra2',
        'formid',
        'subproducto' 
    ];

}