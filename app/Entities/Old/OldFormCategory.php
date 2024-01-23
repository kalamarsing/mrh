<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldFormCategory extends Model
{

    protected $table = 'formcategoria';


    protected $fillable = [
        'formcategoriaid',
        'title',
        'description',
        'position',
        'file',
        'back_colour',
        'font_colour',
        'comments',
        'extra1',
        'extra2',
        'active',
        'icon'
    ];

}