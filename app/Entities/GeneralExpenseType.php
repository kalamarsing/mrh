<?php

namespace App\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GeneralExpenseType extends Model
{
    protected $fillable = [
        'name',
        'value',
        'mrh_cost'
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'general_expense_types';
    
    public function generalExpenses(): HasMany
    {
        return $this->hasMany('\App\Entities\GeneralExpense');
    }

}
