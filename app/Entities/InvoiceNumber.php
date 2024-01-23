<?php

namespace App\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InvoiceNumber extends Model
{

    protected $fillable = [
        'number',
        'year',
        'ordenation',
        'date',
        'user_id'
    ];

    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'invoice_numbers';


    public function user()
    {
        return $this->belongsTo('\App\Entities\User');
    }

    public function financialFiles(): HasMany
    {
        return $this->hasMany('\App\Entities\FinancialFiles');
    }
    
}
