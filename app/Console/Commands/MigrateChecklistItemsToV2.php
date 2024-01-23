<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Entities\ChecklistCategory;
use App\Entities\Old\OldChecklistCategory;
use App\Entities\ChecklistItem;
use App\Entities\Old\OldChecklistItem;
use App\Entities\ChecklistItemProperty;
use App\Entities\Old\OldChecklistItemProperty;
use App\Entities\PropertyItem;
use App\Entities\Old\OldPropertyItem;
use App\Entities\Property;
use App\Entities\Pack;
use App\Entities\Customer;
use App\Entities\User;
use App\Entities\Reservation;

use Hash;

class MigrateChecklistItemsToV2 extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mrh:migrate-checklist-items-to-v2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '05 - Migrates checklist items';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       
        $oldChecklistCategories = OldChecklistCategory::all();
        $iChecklistCategories = 0;

        foreach($oldChecklistCategories as $oldChecklistCategory){
            $checklistCategory = new ChecklistCategory();
            $checklistCategory->id = $oldChecklistCategory->ccategoriaid ;
            $checklistCategory->name = $oldChecklistCategory->nombre ;
            $checklistCategory->position = $oldChecklistCategory->posicion ;
            $checklistCategory->save();

            $iChecklistCategories++;
        }

        $oldChecklistItems = OldChecklistItem::all();
        $iChecklistItems = 0;

        foreach($oldChecklistItems as $oldChecklistItem){
            $checklistItem = new ChecklistItem();
            $checklistItem->id = $oldChecklistItem->citemid ;
            $checklistItem->name = $oldChecklistItem->nombre ;
            $checklistItem->position = $oldChecklistItem->posicion ;
            $checklistItem->checklist_category_id = $oldChecklistItem->ccategoriaid ;
            $checklistItem->save();

            $iChecklistItems++;
        }

        $oldChecklistItemProperties = OldChecklistItemProperty::all();
        $iChecklistItemProperties = 0;

        foreach($oldChecklistItemProperties as $oldChecklistItemProperty){
            $checklistItemProperty = new ChecklistItemProperty();
            $checklistItemProperty->id = $oldChecklistItemProperty->piso_citemid ;
            if($oldChecklistItemProperty->citemid != 0 && $oldChecklistItemProperty->citemid != null && ChecklistItem::where('id',$oldChecklistItemProperty->citemid)->first()){
                $checklistItemProperty->checklist_item_id = $oldChecklistItemProperty->citemid ;
            }
            if($oldChecklistItemProperty->pisoid != 0 && $oldChecklistItemProperty->pisoid != null && Property::where('id',$oldChecklistItemProperty->pisoid)->first()){
                $checklistItemProperty->property_id = $oldChecklistItemProperty->pisoid ;
            }
            $checklistItemProperty->save();

            $iChecklistItemProperties++;
        }

        $oldPropertyItems = OldPropertyItem::all();
        $iPropertyItems = 0;

        foreach($oldPropertyItems as $oldPropertyItem){
            $propertyItem = new PropertyItem();
            $propertyItem->id = $oldPropertyItem->itemid ;
            $propertyItem->name = $oldPropertyItem->nombre ;
            $propertyItem->quantity = $oldPropertyItem->cantidad ;
            $propertyItem->date = $oldPropertyItem->fecha ;
            $propertyItem->notes = $oldPropertyItem->notas  != null ? $oldPropertyItem->notas  :'' ; ;
            $propertyItem->description = $oldPropertyItem->descripcion  != null ? $oldPropertyItem->descripcion  :'' ;;
            $propertyItem->price = $oldPropertyItem->precio ;
            $propertyItem->position = $oldPropertyItem->posicion ;
            $propertyItem->status = $oldPropertyItem->estado ;
            $propertyItem->attachment = $oldPropertyItem->datos_adjuntos ;
            $propertyItem->category = $oldPropertyItem->categoria ;
            if($oldPropertyItem->pisoid != 0 && $oldPropertyItem->pisoid != null && Property::where('id',$oldPropertyItem->pisoid)->first()){
                $propertyItem->property_id = $oldPropertyItem->pisoid ;
            }
            if($oldPropertyItem->usuarioid != 0 && $oldPropertyItem->usuarioid != null && User::where('id',$oldPropertyItem->usuarioid)->first()){
                $propertyItem->user_id = $oldPropertyItem->usuarioid ;
            }

            //ojo eliminamos el campo file pq pese a usarse en le form se guarda en attachemnt datos adjuntos)

            $propertyItem->save();

            $iPropertyItems++;
        }

        return  $iChecklistCategories.' checklist categories migradas a v2 \n '.
                $iChecklistItems.' checklist items migradas a v2 \n '.
                $iChecklistItemProperties.' checklist item properties migrados a v2 \n '.
                $iPropertyItems.' items de properties  migrados a v2 \n'
        ;
    }
}
