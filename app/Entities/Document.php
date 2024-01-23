<?php

namespace App\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Document extends Model
{
    protected $fillable = [
        'file',
        'notes',
        'document_date',
        'upload_date',
        'type',
        'customer_id',
        'property_id'
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'documents';
    
    public function customer()
    {
        return $this->belongsTo('\App\Entities\Customer');
    }

    public function property()
    {
        if($this->property_id){
            return $this->belongsTo('\App\Entities\Property');
        }
    }
}
