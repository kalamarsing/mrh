<?php

namespace App\Entities\Old;

use Illuminate\Database\Eloquent\Model;

class OldMail extends Model
{

    protected $table = 'emails';


    protected $fillable = [
        'emailsid',
        'tipo',
        'email_origen',
        'email_destino_1',
        'email_destino_2',
        'email_destino_3',
        'asunto',
        'texto',
        'success',
        'priority',
        'max_attempts',
        'attempts',
        'register_date',
        'scheluded_date',
        'last_attempt',
        'sent_date'
    ];


}
