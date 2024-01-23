<?php

namespace App\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guest extends Model
{

    protected $fillable = [
        'name',
        'surname',
        'surname2',
        'gender',
        'document_type',
        'document_number',
        'expedition_date',
        'nationality',
        'birthday',
        'address',
        'phone',
        'file',
        'reservation_id'

    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'guests';
    
    public function reservation()
    {
        return $this->belongsTo('\App\Entities\Reservation');
    }

}
