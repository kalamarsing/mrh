<?php

namespace App\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChecklistCategory extends Model
{
    protected $fillable = [
        'name',
        'position'
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'checklist_categories';
    
    public function checklistItems(): HasMany
    {
        return $this->hasMany('\App\Entities\ChecklistItem');
    }


}
