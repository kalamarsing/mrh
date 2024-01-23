<?php

namespace App\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChecklistItem extends Model
{
    protected $fillable = [
        'name',
        'position',
        'checklist_category_id'
    ];


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'checklist_items';

    public function checklistCategory()
    {
        return $this->belongsTo('\App\Entities\ChecklistCategory');
    }
    
    public function properties()
    {
        $this->belongsToMany(Property::class, 'checklist_items_property', 'checklist_item_id', 'property_id');
    }
 
}
