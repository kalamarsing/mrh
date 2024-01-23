<?php

namespace App\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GeneralExpenseMonthGroup extends Model
{
    protected $fillable = [
        'month',
        'date',
        'user_id',
        'deleted',
        'total',
        'year'
    ];



    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'general_expense_month_groups';
    
    public function generalExpenses(): HasMany
    {
        return $this->hasMany('\App\Entities\GeneralExpense');
    }

    public function user()
    {
        return $this->belongsTo('\App\Entities\User');
    }

    
}