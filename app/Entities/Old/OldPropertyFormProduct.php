<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldPropertyFormProduct extends Model
{

    protected $table = 'formproducto_piso';


    protected $fillable = [
        'formproducto_pisoid',
        'formproductoid',
        'pisoid',
        'price',
        'campo1',
        'text',
        'formcategoriaid'
    ];

}