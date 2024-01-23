<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FinancialFile extends Model
{

    protected $fillable = [
        'type',
        'month',
        'customer_id',
        'filename',
        'user_id',
        'generated_at',
        'invoice_concept',
        'campo1',
        'iva_amount',
        'enterprise',
        'sent_at',
        'charged_at',
        'invoice_date',
        'status',
        'total',
        'observations',
        'invoice_number_id'
    ];


    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'financial_files';
    
    public function customer()
    {
        return $this->belongsTo('\App\Entities\Customer');
    }

    public function invoiceNumber()
    {
        return $this->belongsTo('\App\Entities\InvoiceNumber');
    }


    public function user()
    {
        return $this->belongsTo('\App\Entities\User');
    }
}
