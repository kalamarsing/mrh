<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldGeneralExpenseMonthGroup extends Model
{

    protected $table = 'mes_ggasto';


    protected $fillable = [
        'mes_ggastoid',
        'mes',
        'fecha',
        'usuarioid',
        'borrado',
        'total',
        'ano'
    ];

}
