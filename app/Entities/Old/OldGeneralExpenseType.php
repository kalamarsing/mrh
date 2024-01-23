<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldGeneralExpenseType extends Model
{

    protected $table = 'tipo_ggasto';


    protected $fillable = [
        'tipo_ggastoid',
        'nombre',
        'valor',
        'costo_mrh'
    ];

}
