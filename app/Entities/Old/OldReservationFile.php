<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldReservationFile extends Model
{

    protected $table = 'rfile';


    protected $fillable = [
        'rfileid',
        'notas',
        'filetype',
        'file',
        'reservaid'
    ];

}
