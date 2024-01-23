<?php

namespace App\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mail extends Model
{

    protected $fillable = [
        'type',
        'from',
        'to_1',
        'to_2',
        'to_3',
        'subject',
        'body',
        'success',
        'priority',
        'max_attempts',
        'attempts',
        'register_date',
        'scheluded_date',
        'last_attempt',
        'sent_date'
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mails';


}
