<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldGeneralExpense extends Model
{

    protected $table = 'ggasto';


    protected $fillable = [
        'ggastoid',
        'nombre',
        'valor',
        'costo_mrh',
        'tipo_ggastoid',
        'mes_ggastoid',
        'mes',
        'fecha',
        'ano'
    ];

}
