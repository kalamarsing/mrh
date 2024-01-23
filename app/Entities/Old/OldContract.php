<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldContract extends Model
{

    protected $table = 'contrato';


    protected $fillable = [
        'contratoid',
        'file',
        'notas',
        'fecha_contrato',
        'fecha_subida',
        'clienteid',
        'piso',
        'tipo'
    ];

}