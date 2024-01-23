<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldChecklistItemProperty extends Model
{

    protected $table = 'piso_citem';


    protected $fillable = [
        'piso_citemid',
        'pisoid',
        'citemid'
    ];

}
