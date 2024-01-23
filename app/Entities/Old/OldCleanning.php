<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldCleanning extends Model
{

    protected $table = 'limpieza';


    protected $fillable = [
        'limpiezaid',
        'pisoid',
        'coste_mrh',
        'precio_cliente',
        'tipo',
        'comentario',
        'fecha',
        'hora',
        'mes',
        'clienteid',
        'comment_resumen'
    ];


}
