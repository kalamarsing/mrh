<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldChecklistItem extends Model
{

    protected $table = 'citem';


    protected $fillable = [
        'citemid',
        'nombre',
        'ccategoriaid',
        'posicion'
    ];

}
