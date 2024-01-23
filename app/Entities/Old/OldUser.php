<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldUser extends Model
{

    protected $table = 'usuario';


    protected $fillable = [
        'usuarioid',
        'nombre',
        'apellido',
        'email',
        'password',
        'permisos',
        'dni',
        'telefono',
        'movil',
        'direccion',
        'cp',
        'poblacion',
        'provincia',
        'cuenta',
        'banco',
        'observaciones',
        'imagen',
        'rolid',
        'activo'
    ];


}
