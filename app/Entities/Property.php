<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'capacity',
        'comments',
        'customer_id',
        'number',
        'pack_id',
        'airbnb_name',
        'map_url',
        'guest_cleanning_price',
        'guest_checkin_price',
        'guest_checkout_price',
        'guest_pickup_shuttle_price',
        'guest_return_shuttle_price',
        'guest_internet_price',
        'guest_basket_food_price',
        'guest_parking_price',
        'guest_cleanning_without_cloth_price',
        'guest_cleanning_with_cloth_price',
        'mrh_cleanning_cost',
        'mrh_checkin_cost',
        'mrh_checkout_cost',
        'mrh_pickup_shuttle_cost',
        'mrh_return_shuttle_cost',
        'mrh_internet_cost',
        'mrh_basket_food_cost',
        'mrh_parking_cost',
        'mrh_cleanning_without_cloth_cost',
        'mrh_cleanning_with_cloth_cost',
        'cleanning_time',
        'default_assignation1_id',
        'default_assignation2_id',
        'default_assignation3_id',
        'inventory_file',
        'licence_number',
        'minimum_reservation_price',
        'status',
        'active',
        'police',
        'airbnb_listing_1',
        'airbnb_listing_2',
        'airbnb_listing_3',
        'airbnb_extras',
        'touristic_tax',
        'touristic_tax_value',
        'laundry_id',
        'laundry_address_comment',
        'laundry_pack_price'
    ];
    

    protected $table = 'properties';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    public function pack()
    {
        return $this->belongsTo('\App\Entities\Pack');
    }

    public function customer()
    {
        return $this->belongsTo('\App\Entities\Customer');
    }

    public function laundry()
    {
        return $this->belongsTo('\App\Entities\User', 'id', 'laundry_id');
    }


    public function documents(): HasMany
    {
        return $this->hasMany('\App\Entities\Document');
    }

    public function incomes(): HasMany
    {
        return $this->hasMany('\App\Entities\Income');
    }

    public function checklistItems(): BelongsToMany
    {
        $this->belongsToMany(ChecklistItems::class, 'checklist_items_property', 'property_id', 'checklist_item_id');
    }

    public function events(): HasMany
    {
        return $this->hasMany('\App\Entities\Event');
    }

    public function suppliers(): HasMany
    {
        return $this->hasMany('\App\Entities\Supplier');
    }
}
