<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'surname', 
        'email', 
        'password',
        'public_password',
        'type',
        'dni',
        'phone',
        'mobile',
        'address',
        'postal_code',
        'city',
        'province',
        'account',
        'bank',
        'comments',
        'image',
        'bank_address',
        'swift_code',
        'billing_concept',
        'billing_name',
        'billing_nif',
        'billing_address',
        'billing_postal_code',
        'billing_city',
        'billing_country',
        'billing_logo',
        'billing_amount',
        'billing_email',
        'billing_required',
        'billing_email2',
        'start_date',
        'end_date',
        'birthday',
        'extra_phone',
        'status',
        'gen_password_status',
        'irpf',
        'iva',
        'new_reservation_email',
        'pack_id'
    ];

    protected $table = 'customers';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];


    public function pack()
    {
        return $this->belongsTo('\App\Entities\Pack');
    }

    public function documents(): HasMany
    {
        return $this->hasMany('\App\Entities\Document');
    }

    public function properties(): HasMany
    {
        return $this->hasMany('\App\Entities\Property');
    }

    public function incomes(): HasMany
    {
        return $this->hasMany('\App\Entities\Income');
    }

    public function financialFiles(): HasMany
    {
        return $this->hasMany('\App\Entities\FinancialFiles');
    }
}
