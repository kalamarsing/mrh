<?php

namespace App\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

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
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function incomes(): HasMany
    {
        return $this->hasMany('\App\Entities\Income');
    }

    public function checkinAssignations(): HasMany
    {
        return $this->hasMany('\App\Entities\CheckinAssignation');
    }

    public function checkoutAssignations(): HasMany
    {
        return $this->hasMany('\App\Entities\CheckoutAssignation');
    }

    public function cleanningAssignations(): HasMany
    {
        return $this->hasMany('\App\Entities\CleanningAssignation');
    }

    public function manteinanceActionAssignations(): HasMany
    {
        return $this->hasMany('\App\Entities\ManteinanceActionAssignation');
    }

    public function reservations(): HasMany
    {
        return $this->hasMany('\App\Entities\Reservation');
    }

    public function events(): HasMany
    {
        return $this->hasMany('\App\Entities\Event');
    }

    public function role()
    {
        return $this->belongsTo('\App\Entities\Role');
    }

    public function financialFiles(): HasMany
    {
        return $this->hasMany('\App\Entities\FinancialFiles');
    }


    public function hasRole($role) {
        if ($this->role()->first()->name ==  $name) {
            return true;
        }
        return false;
    }

}
