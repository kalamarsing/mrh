<?php

namespace App\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GeneralExpense extends Model
{


    //NOta, esto funciona así,se cerea un generalexpensaemonth total, un mesy ahi dentro se asignan una seri de general expenses a ese mes.  
    //Cada mes tiene unos gastos. Los tipos serianocmo una serie de gastos prefijados y cuando creamosun mes decidimos cual incluir y cual no,
    //mas que un tipo son Available General Expenses

    protected $fillable = [
        'name',
        'value',
        'mrh_cost',
        'month',
        'date',
        'year',
        'general_expense_type_id',
        'general_expense_month_group_id'
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'general_expenses';
    
    public function type()
    {
        return $this->belongsTo('\App\Entities\GeneralExpenseType');
    }


    public function monthGroup()
    {
        return $this->belongsTo('\App\Entities\GeneralExpenseMonthGroup');
    }
}
