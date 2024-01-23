<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldPropertyItem extends Model
{

    protected $table = 'item';


    protected $fillable = [
        'itemid',
        'nombre',
        'cantidad',
        'fecha',
        'notas',
        'precio',
        'descripcion',
        'posicion',
        'file',
        'estado',
        'datos_adjuntos',
        'categoria',
        'pisoid',
        'usuarioid'
    ];

}
