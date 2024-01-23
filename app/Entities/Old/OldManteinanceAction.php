<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldManteinanceAction extends Model
{

    protected $table = 'mantenimiento';


    protected $fillable = [
            'mantenimientoid',
            'pisoid',
            'coste_materiales',
            'coste_mano_obra',
            'precio_cliente',
            'nombre',
            'descripcion' ,
            'fecha_inicio',
            'hora_inicio',
            'mes',
            'clienteid',
            'total_mrh',
            'fecha_fin',
            'hora_fin',
            'notas' ,
            'posicion',
            'file1',
            'file2',
            'file3',
            'file4',
            'file5',
            'estado',
            'tipo1',
            'tipo2',
            'tipo3',
            'tipo4',
            'tipo5',
            'mantenimiento_estado_pago',
            'adelanto',
            'requiere_mail_confirmacion'
    ];


}
