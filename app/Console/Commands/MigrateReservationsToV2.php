<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Entities\Reservation;
use App\Entities\Form;
use App\Entities\FormCategory;
use App\Entities\FormProduct;
use App\Entities\BuyedFormProduct;
use App\Entities\Property;
use App\Entities\Pack;
use App\Entities\Customer;
use App\Entities\User;
use App\Entities\PropertyFormProduct;
use App\Entities\Old\OldReservation;
use App\Entities\Old\OldForm;
use App\Entities\Old\OldFormCategory;
use App\Entities\Old\OldFormProduct;
use App\Entities\Old\OldBuyedFormProduct;
use App\Entities\Old\OldPropertyFormProduct;
use Hash;

class MigrateReservationsToV2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mrh:migrate-reservations-to-v2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '03 - Migrates reservations, incomes,  etc from database v1 version to v2';

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

        //FORM -> FORMS
        $oldForms = OldForm::all();
        $numForms = 0;

        foreach($oldForms as $oldForm){
    
            $form = new Form();
            $form->id = $oldForm->formid;
            $form->status = $oldForm->status;
            $form->sent_at = $oldForm->fecha_enviado;
            $form->filled_at = $oldForm->fecha_rellenado;
            $form->total = $oldForm->total;
            $form->advance = $oldForm->anticipo;
            $form->remaining = $oldForm->restante;
            $form->payment_method = $oldForm->metodo_pago;
            $form->payment_status = $oldForm->status_pago;
            $form->payment_id = $oldForm->pago_id;
            $form->arrival_transport = $oldForm->llegada_tipo;
            $form->arrival_shuttle_required = $oldForm->llegada_shuttle_requerido_ida ? $oldForm->llegada_shuttle_requerido_ida  : 'No';
            $form->arrival_transport_number = $oldForm->llegada_numero_transporte;
            $form->arrival_terminal = $oldForm->llegada_terminal;
            $form->arrival_date = $oldForm->llegada_fecha;
            $form->arrival_form = $oldForm->llegada_procedencia;
            $form->arrival_destination_property = $oldForm->llegada_destino;
            $form->arrival_shuttle_num_people = $oldForm->llegada_num_personas_coche;
            $form->arrival_shuttle_comments = $oldForm->llegada_notas_coche;
         //   $form->arrival_ = $oldForm->llegada_shuttle_ida_vuelta;
            $form->shuttle_total = $oldForm->total_shuttle;
            $form->parking_required = $oldForm->llegada_parking_requerido ? $oldForm->llegada_parking_requerido : 'No';
            $form->parking_total = $oldForm->total_parking;
            $form->checkin_time = $oldForm->checkin_time;
            $form->checkout_time = $oldForm->checkout_time;
            $form->comments = $oldForm->notas;
            $form->reservation_id = $oldForm->reservaid;
            $form->arrival_transport_company = $oldForm->llegada_compania_transporte;
            $form->food_essential_pack = $oldForm->comida_essential_pack;
            $form->food_gourmet_pack = $oldForm->comida_gourmet_pack;
            $form->food_wine_pack = $oldForm->comida_wine_pack;
            $form->food_soft_pack = $oldForm->comida_soft_pack;
            $form->food_comments = $oldForm->comida_notas;
            $form->food_total = $oldForm->total_checkin_late;
            $form->property_arrival_estimated_time = $oldForm->estimated_time ? $oldForm->estimated_time: '' ;
            $form->departure_shuttle_required = $oldForm->llegada_shuttle_requerido_vuelta ?$oldForm->llegada_shuttle_requerido_vuelta : 'No' ;
            $form->departure_airport = $oldForm->departure_aeropuerto ? $oldForm->departure_aeropuerto:'';
            $form->departure_transport_number = $oldForm->salida_numero_transporte? $oldForm->salida_numero_transporte:'';
            $form->departure_terminal = $oldForm->salida_terminal?$oldForm->salida_terminal :'';
            $form->departure_transport_company = $oldForm->salida_compania_transporte? $oldForm->salida_compania_transporte:'';
            $form->arrival_shuttle_total = $oldForm->total_shuttle_ida? $oldForm->total_shuttle_ida:'';
            $form->departure_shuttle_total = $oldForm->total_shuttle_vuelta?  $oldForm->total_shuttle_vuelta:'';
            $form->departure_date = $oldForm->salida_fecha? $oldForm->salida_fecha:'';
            $form->departure_shuttle_num_people = $oldForm->vuelta_num_personas_coche?$oldForm->vuelta_num_personas_coche :'';
            $form->total_extras = $oldForm->total_extras ? $oldForm->total_extra :'';

            $form->save();
            $numForms++;

        }

        //FORM CATEGORIA -> FORM CATEGORIES
        $oldFormCategories = OldFormCategory::all();
        $numFormCategorys = 0;

        foreach($oldFormCategories as $oldFormCategory){
      
              $formCategory = new FormCategory();
              $formCategory->id = $oldFormCategory->formcategoriaid;
              $formCategory->title = $oldFormCategory->title;
              $formCategory->description = $oldFormCategory->description;
              $formCategory->position = $oldFormCategory->position;
              $formCategory->active = $oldFormCategory->active;
              $formCategory->icon = $oldFormCategory->icon;
              $formCategory->save();
              $numFormCategorys++;
  
        }

        //FORM PRODUCTO -> FORM PRODUCTS
        $oldFormProducts = OldFormProduct::all();
        $numFormProducts = 0;

        foreach($oldFormProducts as $oldFormProduct){
      
              $formProduct = new FormProduct();
              $formProduct->id = $oldFormProduct->formproductoid;
              $formProduct->title = $oldFormProduct->title;
              $formProduct->description = $oldFormProduct->description;
              $formProduct->position = $oldFormProduct->position;
              $formProduct->file = $oldFormProduct->file;
              $formProduct->form_category_id = $oldFormProduct->formcategoriaid;
              $formProduct->price = $oldFormProduct->price;
              $formProduct->active = $oldFormProduct->active;
              $formProduct->cost = $oldFormProduct->cost;
              $formProduct->more_info = $oldFormProduct->mas_info;
              $formProduct->parent_id = $oldFormProduct->formproductopadre;
              $formProduct->save();
              $numFormProducts++;
  
        }


         //FORM PRODUCTO BUYED -> BUYED FORM PRODUCTS
         $oldBuyedFormProducts = OldBuyedFormProduct::all();
         $numBuyedFormProducts = 0;
 
         foreach($oldBuyedFormProducts as $oldBuyedFormProduct){
               $buyedFormProduct = new BuyedFormProduct();
               $buyedFormProduct->id = $oldBuyedFormProduct->formproductobuyedid;
               $buyedFormProduct->form_product_id = $oldBuyedFormProduct->formproductoid;
               $buyedFormProduct->price = $oldBuyedFormProduct->price;
               $buyedFormProduct->cost = $oldBuyedFormProduct->cost;
               $buyedFormProduct->form_id = $oldBuyedFormProduct->formid;
               $buyedFormProduct->subproduct = $oldBuyedFormProduct->subproducto;
               $buyedFormProduct->save();
               $numBuyedFormProducts++;
         }

        //FORM PRODUCTO PISO -> PROPERTYFORM PRODUCTS
        $oldPropertyFormProducts = OldPropertyFormProduct::all();
        $numPropertyFormProducts = 0;

        foreach($oldPropertyFormProducts as $oldPropertyFormProduct){
            $propertyFormProduct = new PropertyFormProduct();
            $propertyFormProduct->id = $oldPropertyFormProduct->formproducto_pisoid;
            $propertyFormProduct->form_product_id = $oldPropertyFormProduct->formproductoid;
            $propertyFormProduct->property_id = $oldPropertyFormProduct->pisoid;
            $propertyFormProduct->save();
            $numPropertyFormProducts++;
        }
 


        //RESERVAS -> RESERVATIONS
        $oldReservations = OldReservation::all();
        $numReservations = 0;

        foreach($oldReservations as $oldReservation){
 
            $reservation = new Reservation();
            $reservation->id = $oldReservation->reservaid;
            $reservation->booking_number = $oldReservation->num_reserva;
            $reservation->host_name = $oldReservation->host_name;
            $reservation->persons = $oldReservation->num_personas;
            $reservation->web = $oldReservation->web;
            $reservation->date_in = $oldReservation->fecha_in;
            $reservation->date_out = $oldReservation->fecha_out;
            $reservation->days = $oldReservation->dias;
            $reservation->rental_income = $oldReservation->rental_income;
            $reservation->checkin = $oldReservation->checkin;
            $reservation->checkin_price = $oldReservation->checkin_precio;
            $reservation->checkout = $oldReservation->checkout;
            $reservation->checkout_price = $oldReservation->checkout_precio;
            $reservation->shuttle_pickup = $oldReservation->shuttle_recogida;
            $reservation->shuttle_pickup_price = $oldReservation->shuttle_recogida_precio;
            $reservation->shuttle_return = $oldReservation->shuttle_return;
            $reservation->shuttle_return_price = $oldReservation->shuttle_ida_precio;
            $reservation->internet = $oldReservation->internet;
            $reservation->internet_price = $oldReservation->internet_precio;
            $reservation->replacement_extras = $oldReservation->replacement_extras;
            $reservation->replacement_extras_price = $oldReservation->replacement_extras_precio;
            $reservation->income_destination = $oldReservation->income_destination;
            $reservation->month = $oldReservation->mes;
            $reservation->resetvation_date = $oldReservation->fecha_reserva;
            if($oldReservation->pisoid != 0 && $oldReservation->pisoid != null && Property::where('id',$oldReservation->pisoid)->first()){
                $reservation->property_id = $oldReservation->pisoid;
            }
            if($oldReservation->packid != 0 && $oldReservation->packid != null && Pack::where('id',$oldReservation->packid)->first()){
                $reservation->pack_id = $oldReservation->packid != 0? $oldReservation->packid : null;
            }
            if($oldReservation->clienteid != 0 && $oldReservation->clienteid != null && Customer::where('id',$oldReservation->clienteid)->first()){
                $reservation->customer_id = $oldReservation->clienteid != 0? $oldReservation->clienteid : null;
            }
            if($oldReservation->usuarioid != 0 && $oldReservation->usuarioid != null && User::where('id',$oldReservation->usuarioid)->first()){
                $reservation->user_id = $oldReservation->usuarioid;
            }
            $reservation->cleanning = $oldReservation->cleanning;
            $reservation->cleanning_price = $oldReservation->cleanning_precio;
            $reservation->comments = $oldReservation->observaciones;
            $reservation->passport = $oldReservation->pasaporte;
            $reservation->file = $oldReservation->file;
            $reservation->host_email = $oldReservation->host_email;
            $reservation->host_phone = $oldReservation->host_phone;
            $reservation->reservation_code = $oldReservation->reserva_code;
            $reservation->form_id = $oldReservation->formid !== 0 ? $oldReservation->formid:null;
            $reservation->form_status = $oldReservation->form_status;
            $reservation->email_customer_status = $oldReservation->email_cliente_status;
            $reservation->night_price = $oldReservation->precio_noche;
            $reservation->basket = $oldReservation->cesta;
            $reservation->basket_price = $oldReservation->cesta_precio;
            $reservation->parking = $oldReservation->parking;
            $reservation->parking_price = $oldReservation->parking_precio;
            $reservation->mrh_cleanning_cost = $oldReservation->cleanning_costo_mrh;
            $reservation->mrh_checkin_cost = $oldReservation->checkin_costo_mrh;
            $reservation->mrh_checkout_cost = $oldReservation->checkout_costo_mrh;
            $reservation->mrh_shuttle_pickup_cost = $oldReservation->shuttle_recogida_costo_mrh;
            $reservation->mrh_shuttle_return_cost = $oldReservation->shuttle_ida_costo_mrh;
            $reservation->mrh_replacement_extras_cost = $oldReservation->replacement_extras_costo_mrh;
            $reservation->mrh_basket_cost = $oldReservation->cesta_costo_mrh;
            $reservation->mrh_parking_cost = $oldReservation->parking_costo_mrh;
            $reservation->checkin_time = $oldReservation->checkin_time;
           // $reservation->observaciones_cin = $oldReservation->observaciones_cin;
            $reservation->checkin_payment_status = $oldReservation->checkin_estado_pago;
            $reservation->cleanning_payment_status = $oldReservation->cleanning_estado_pago;
            $reservation->checkout_time = $oldReservation->checkout_time;
            $reservation->num_people_in_arrival_car = $oldReservation->llegada_num_personas_coche;
            $reservation->num_people_in_return_car = $oldReservation->vuelta_num_personas_coche;
            $reservation->airbnb_total_nights = $oldReservation->airbnb_total_nights;
            $reservation->airbnb_extras = $oldReservation->airbnb_extras;
            $reservation->airbnb_service_fee = $oldReservation->airbnb_service_fee;
            $reservation->cleanning_comments = $oldReservation->notas_limpieza !== null? $oldReservation->notas_limpieza : '';
            $reservation->checkin_comments = $oldReservation->notas_checkin !== null? $oldReservation->notas_checkin :'';
            $reservation->extras = $oldReservation->extras;
            $reservation->extras_price = $oldReservation->extras_precio;
            $reservation->mrh_extras_cost = $oldReservation->extras_costo_mrh;
            $reservation->touristic_tax = $oldReservation->touristic_tax;
            $reservation->save();
            $numReservations++;

        }

        return  $numReservations.' reservations migrados a v2  \n ';
    }
}
