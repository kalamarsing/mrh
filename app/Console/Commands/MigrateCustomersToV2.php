<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Entities\Pack;
use App\Entities\Old\OldPack;
use App\Entities\Document;
use App\Entities\Old\OldContract;
use App\Entities\Customer;
use App\Entities\Old\OldCustomer;
use App\Entities\Property;
use App\Entities\Old\OldProperty;
use Hash;

class MigrateCustomersToV2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mrh:migrate-customers-to-v2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '02 - Migrates customers, properties, contracts, etc from database v1 version to v2';

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
        $numPacks = 0;
        $numCustomers = 0;
        $numProperties = 0;
        $numDocuments = 0;

        //PACKS -> PACKS
        $oldPacks = OldPack::all();

        foreach($oldPacks as $oldPack){
            $pack = new Pack();
            $pack->id = $oldPack->packid ;
            $pack->name = $oldPack->nombre ;
            $pack->percent = $oldPack->porcentaje ;
            $pack->fixed = $oldPack->fijo ;
            $pack->save();
            $numPacks++;

        }

        //CLIENTES -> CUSTOMERS
        $oldCustomers = OldCustomer::all();

        foreach($oldCustomers as $oldCustomer){
            $customer = new Customer();
            $customer->id = $oldCustomer->clienteid ;
            $customer->name = $oldCustomer->nombre ;
            $customer->surname = $oldCustomer->apellido ;
            $customer->email = $oldCustomer->email ;
            $customer->password = trim(Hash::make($oldCustomer->password));
            $customer->public_password = $oldCustomer->password ;
            $customer->type = $oldCustomer->permisos ;
            $customer->dni = $oldCustomer->dni ;
            $customer->phone = $oldCustomer->telefono ;
            $customer->mobile = $oldCustomer->movil ;
            $customer->address = $oldCustomer->direccion ;
            $customer->postal_code = $oldCustomer->cp;
            $customer->city = $oldCustomer->poblacion ;
            $customer->province = $oldCustomer->pais ;
            $customer->account = $oldCustomer->cuenta ;
            $customer->bank = $oldCustomer->banco ;
            $customer->comments = $oldCustomer->observaciones ;
            $customer->image = $oldCustomer->imagen ;
            $customer->active = $oldCustomer->activo ;
            $customer->bank_address = $oldCustomer->direccion_banco ;
            $customer->swift_code = $oldCustomer->swift_code ;
            $customer->billing_concept = $oldCustomer->concepto_factura ;
            $customer->billing_name = $oldCustomer->nombre_facturacion ;
            $customer->billing_nif = $oldCustomer->nif_facturacion ;
            $customer->billing_address = $oldCustomer->direccion_facturacion ;
            $customer->billing_postal_code = $oldCustomer->cp_facturacion ;
            $customer->billing_city = $oldCustomer->ciudad_facturacion ;
            $customer->billing_country = $oldCustomer->pais_facturacion ;
            $customer->billing_logo = $oldCustomer->logo_facturacion ;
            $customer->billing_amount = $oldCustomer->importe_facturacion ;
            $customer->billing_email = $oldCustomer->email_facturacion ;
            $customer->billing_required = $oldCustomer->requiere_factura ;
            $customer->billing_email2 = $oldCustomer->email2_facturacion ;
            $customer->start_date = $oldCustomer->fecha_alta ;
            $customer->end_date = $oldCustomer->fecha_baja ;
            $customer->birthday = $oldCustomer->fecha_cumpleanos ;
            $customer->extra_phone = $oldCustomer->other_phone ;
            $customer->status = $oldCustomer->estado ;
            $customer->gen_password_status = $oldCustomer->estado_gen_password ;
            $customer->irpf = $oldCustomer->irpf ;
            $customer->iva = $oldCustomer->iva ;
            $customer->new_reservation_email = $oldCustomer->email_nueva_reserva ;
            $customer->pack_id = $oldCustomer->packid != 0 ? $oldCustomer->packid : null;
            $customer->save();
            $numCustomers++;

        }

        //PISOS -> PROPERTIES
        $oldProperties = OldProperty::all();

        foreach($oldProperties as $oldProperty){
            $property = new Property();
            $property->id = $oldProperty->pisoid ;
            $property->name = $oldProperty->nombre ;
            $property->address = $oldProperty->direccion ;
            //propietario desaparece
            $property->capacity = $oldProperty->capacidad ;
            $property->comments = $oldProperty->text ;
            $property->customer_id = $oldProperty->clienteid != 0 ? $oldProperty->clienteid : null ;
            $property->number = $oldProperty->numero ;
            $property->pack_id = $oldProperty->packid != 0 ? $oldProperty->packid : null;
            $property->airbnb_name = $oldProperty->nombre_airbnb ;
            $property->map_url = $oldProperty->url_mapa ;

            $property->guest_cleanning_price = $oldProperty->cleanning ;
            $property->guest_checkin_price = $oldProperty->checkin ;
            $property->guest_checkout_price = $oldProperty->checkout ;
            $property->guest_pickup_shuttle_price = $oldProperty->shuttle_recogida ;
            $property->guest_return_shuttle_price = $oldProperty->shuttle_ida ;
            $property->guest_internet_price = $oldProperty->internet ;
            $property->guest_basket_food_price = $oldProperty->cesta ;
            $property->guest_parking_price = $oldProperty->parking ;
            $property->guest_cleanning_without_cloth_price = $oldProperty->limpieza_sin_ropa_precio ;
            $property->guest_cleanning_with_cloth_price = $oldProperty->limpieza_con_ropa_precio ;
            $property->mrh_cleanning_cost = $oldProperty->cleanning_costo_mrh ;
            $property->mrh_checkin_cost = $oldProperty->checkin_costo_mrh ;
            $property->mrh_checkout_cost = $oldProperty->checkout_costo_mrh ;
            $property->mrh_pickup_shuttle_cost = $oldProperty->shuttle_recogida_costo_mrh ;
            $property->mrh_return_shuttle_cost = $oldProperty->shuttle_ida_costo_mrh ;
            $property->mrh_internet_cost = $oldProperty->internet_costo_mrh ;
            $property->mrh_basket_food_cost = $oldProperty->cesta_costo_mrh ;
            $property->mrh_parking_cost = $oldProperty->parking_costo_mrh ;
            $property->mrh_cleanning_without_cloth_cost = $oldProperty->limpieza_sin_ropa_costo ;
            $property->mrh_cleanning_with_cloth_cost = $oldProperty->limpieza_con_ropa_costo ;
            $property->cleanning_time = $oldProperty->limpieza_tiempo;

            $property->default_assignation1_id = $oldProperty->asignado_default1 != 0 &&  $oldProperty->asignado_default1 != 1 ? $oldProperty->asignado_default1 : null ;
            $property->default_assignation2_id = $oldProperty->asignado_default2 != 0 &&  $oldProperty->asignado_default2 != 1 ? $oldProperty->asignado_default2 : null ;
            $property->default_assignation3_id = $oldProperty->asignado_default3 != 0 &&  $oldProperty->asignado_default3 != 1 ? $oldProperty->asignado_default3 : null ;
            $property->inventory_file = $oldProperty->inventario_file ;
            $property->licence_number = $oldProperty->num_licencia ;
            $property->minimum_reservation_price = $oldProperty->precio_minimo_reserva ;
            $property->status = $oldProperty->estado ;
            $property->active = $oldProperty->activo ;
            $property->police = $oldProperty->policia ;
            $property->airbnb_listing_1 = $oldProperty->airbnb_listing_1 ;
            $property->airbnb_listing_2 = $oldProperty->airbnb_listing_2 ;
            $property->airbnb_listing_3 = $oldProperty->airbnb_listing_3 ;
            $property->airbnb_extras = $oldProperty->airbnb_extras ;
            $property->email_extras = $oldProperty->email_extras ;
            $property->touristic_tax = $oldProperty->touristic_tax ;
            $property->touristic_tax_value = $oldProperty->touristic_tax_value ;
            $property->laundry_id = $oldProperty->laundry_service != 0 ? $oldProperty->laundry_service : null ;
            $property->laundry_address_comment = $oldProperty->laundry_address_comment ? $oldProperty->laundry_address_comment : '' ;
            $property->laundry_pack_price = $oldProperty->laundry_pack_price ;
            $property->save();
            $numProperties++;
        }

        //CONTRACTS -> DOCUMENTS
        $oldContracts = OldContract::all();

        foreach($oldContracts as $oldContract){
            $document = new Document();
            $document->id = $oldContract->contratoid ;
            $document->file = $oldContract->file ;
            $document->notes = $oldContract->notas ;
            $document->document_date = $oldContract->fecha_contrato ;
            $document->upload_date = $oldContract->fecha_subida ;
            $document->customer_id = $oldContract->clienteid != 0 ? $oldContract->clienteid : null ;
            $document->property_id = $oldContract->piso != 0 ? $oldContract->piso : null ;
            $document->type = $oldContract->tipo ;
            $document->save();
            $numDocuments++;
        }


        return  $numPacks.' packs migrados a v2  \n '.
                $numCustomers.' clientes migrados a v2 \n '.
                $numProperties.' Pisos migrados a V2 \n '.
                $numDocuments.' contracts/documents migrados a v2  \n ';
    }
}
