<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldPunctualPropertyExpense extends Model
{

    protected $table = 'ogasto';


    protected $fillable = [
        'ogastoid',
        'concepto',
        'cantidad',
        'fecha',
        'costo_mrh',
        'mes',
        'file',
        'pisoid',
        'usuarioid'
    ];

}
