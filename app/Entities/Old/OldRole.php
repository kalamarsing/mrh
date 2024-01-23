<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldRole extends Model
{

    protected $table = 'rol';


    protected $fillable = [
        'rolid',
        'nombre'
    ];


}
