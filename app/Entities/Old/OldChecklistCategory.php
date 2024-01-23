<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldChecklistCategory extends Model
{

    protected $table = 'ccategoria';


    protected $fillable = [
        'ccategoriaid',
        'nombre',
        'posicion'
    ];

}
