<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldPack extends Model
{

    protected $table = 'pack';


    protected $fillable = [
        'packid',
        'nombre',
        'porcentaje',
        'fijo'
    ];


}
