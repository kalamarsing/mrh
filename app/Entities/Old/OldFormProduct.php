<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldFormProduct extends Model
{

    protected $table = 'formproducto';


    protected $fillable = [
        'formproductoid',
        'title',
        'description',
        'position',
        'file',
        'formcategoriaid',
        'price',
        'default',
        'comment',
        'extra1',
        'extra2',
        'active',
        'cost',
        'mas_info',
        'formproductopadre'
    ];

}