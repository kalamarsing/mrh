<?php

namespace App\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChecklistItemProperty extends Model
{
    protected $fillable = [
        'checklist_item_id',
        'property_id'
    ];


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'checklist_item_property';

    public function property(): BelongsTo
    {
        return $this->belongsTo('\App\Entities\Property');
    }
    
    public function checklistItem(): BelongsTo
    {
        return $this->belongsTo('\App\Entities\ChecklistItem');
    }
 
}
