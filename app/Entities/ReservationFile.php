<?php

namespace App\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ReservationFile extends Model
{

    protected $fillable = [
        'notes',
        'filetype',
        'file',
        'reservation_id'
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reservation_files';
    
    public function reservation()
    {
        return $this->belongsTo('\App\Entities\Reservation');
    }

}
