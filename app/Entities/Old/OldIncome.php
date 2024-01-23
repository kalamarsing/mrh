<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldIncome extends Model
{

    protected $table = 'income';


    protected $fillable = [
        'incomeid',
        'concepto',
        'cantidad',
        'fecha',
        'mes',
        'clienteid',
        'usuarioid',
        'reservaid',
        'pisoid'
    ];

}
