<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldEvent extends Model
{

    protected $table = 'historia';


    protected $fillable = [
        'historiaid',
        'fecha',
        'suceso',
        'costo',
        'notas',
        'datos_adjuntos',
        'pisoid',
        'usuarioid'
    ];

}
