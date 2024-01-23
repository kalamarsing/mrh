<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Entities\CheckinAssignation;
use App\Entities\Old\OldChecknAssignation;
use App\Entities\CheckoutAssignation;
use App\Entities\Old\OldCheckoutAssignation;
use App\Entities\ManteinanceAction;
use App\Entities\Old\OldManteinanceAction;
use App\Entities\ManteinanceActionAssignation;
use App\Entities\Old\OldManteinanceActionAssignation;
use App\Entities\Cleanning;
use App\Entities\Old\OldCleanning;
use App\Entities\CleanningAssignation;
use App\Entities\Old\OldCleanningAssignation;
use App\Entities\Property;
use App\Entities\Pack;
use App\Entities\Customer;
use App\Entities\User;
use App\Entities\Reservation;
use Hash;

class MigrateAssignationsToV2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mrh:migrate-assignations-to-v2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '04 - Migrates checkin, checkout, cleanning and manteinance assignations';

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
        $oldCheckinAssignations = OldChecknAssignation::all();
        $iCheckin = 0;

        foreach($oldCheckinAssignations as $oldCheckinAssignation){
            $checkinAssignation = new CheckinAssignation();
            $checkinAssignation->id = $oldCheckinAssignation->asignacionid ;
            $checkinAssignation->number = $oldCheckinAssignation->numero !== '' ? $checkinAssignation->number: 0 ;
            if($oldCheckinAssignation->usuario != 0 && $oldCheckinAssignation->usuario != null && User::where('id',$oldCheckinAssignation->usuario)->first()){
                $checkinAssignation->user_id = $oldCheckinAssignation->usuario ;
            }
            if($oldCheckinAssignation->reserva != 0 && $oldCheckinAssignation->reserva != null && Reservation::where('id',$oldCheckinAssignation->reserva)->first()){
                $checkinAssignation->reservation_id = $oldCheckinAssignation->reserva ;
            }
            $checkinAssignation->status = $oldCheckinAssignation->estado ;
            $checkinAssignation->save();
            $iCheckin++;

        }

        $oldCheckoutAssignations = OldCheckoutAssignation::all();
        $iCheckout = 0;

        foreach($oldCheckoutAssignations as $oldCheckoutAssignation){
            $checkoutAssignation = new CheckoutAssignation();
            $checkoutAssignation->id = $oldCheckoutAssignation->asignacioncid ;
            $checkoutAssignation->number = $oldCheckoutAssignation->numero!= '' ?$oldCheckoutAssignation->numero : 0 ;
            if($oldCheckoutAssignation->usuario != 0 && $oldCheckoutAssignation->usuario != null && User::where('id',$oldCheckoutAssignation->usuario)->first()){
                $checkoutAssignation->user_id = $oldCheckoutAssignation->usuario ;
            }
            if($oldCheckoutAssignation->reserva != 0 && $oldCheckoutAssignation->reserva != null && Reservation::where('id',$oldCheckoutAssignation->reserva)->first()){
                $checkoutAssignation->reservation_id = $oldCheckoutAssignation->reserva ;
            }
            $checkoutAssignation->status = $oldCheckoutAssignation->estado ;
            $checkoutAssignation->laundry_id = $oldCheckoutAssignation->laundryid ;
            $checkoutAssignation->delivery_time_init = $oldCheckoutAssignation->delivery_time_init ;
            $checkoutAssignation->delivery_time_end = $oldCheckoutAssignation->delivery_time_end ;
            $checkoutAssignation->delivery_price = $oldCheckoutAssignation->delivery_price ;
            $checkoutAssignation->delivery_amenities = $oldCheckoutAssignation->delivery_amenities ;
            $checkoutAssignation->delivery_notes = $oldCheckoutAssignation->delivery_notes!= null ? $oldCheckoutAssignation->delivery_notes : '' ;
            $checkoutAssignation->save();
            $iCheckout++;

        }


        $oldManteinanceActions = OldManteinanceAction::all();
        $iManteinanceActions = 0;

        foreach($oldManteinanceActions as $oldManteinanceAction){
            $manteinanceAction = new ManteinanceAction();
            $manteinanceAction->id = $oldManteinanceAction->mantenimientoid ;
            if($oldManteinanceAction->pisoid != 0 && $oldManteinanceAction->pisoid != null && Property::where('id',$oldManteinanceAction->pisoid)->first()){
                $manteinanceAction->property_id = $oldManteinanceAction->pisoid ;
            }
            if($oldManteinanceAction->clienteid != 0 && $oldManteinanceAction->clienteid != null && Customer::where('id',$oldManteinanceAction->clienteid)->first()){
                $manteinanceAction->customer_id = $oldManteinanceAction->clienteid ;
            }
            $manteinanceAction->material_cost = $oldManteinanceAction->coste_materiales ;
            $manteinanceAction->labour_cost = $oldManteinanceAction->coste_mano_obra ;
            $manteinanceAction->customer_price = $oldManteinanceAction->precio_cliente ;
            $manteinanceAction->name = $oldManteinanceAction->nombre ;
            $manteinanceAction->description = $oldManteinanceAction->descripcion != null ? $oldManteinanceAction->descripcion:'' ;
            $manteinanceAction->init_date = $oldManteinanceAction->fecha_inicio ;
            $manteinanceAction->init_time = $oldManteinanceAction->hora_inicio ;
            $manteinanceAction->month = $oldManteinanceAction->mes ;
            $manteinanceAction->mrh_total = $oldManteinanceAction->total_mrh ;
            $manteinanceAction->end_date = $oldManteinanceAction->fecha_fin ;
            $manteinanceAction->end_time = $oldManteinanceAction->hora_fin ;
            $manteinanceAction->notes = $oldManteinanceAction->notas != null ? $oldManteinanceAction->notas:'' ;
            $manteinanceAction->position = $oldManteinanceAction->posicion ;
            $manteinanceAction->file_1 = $oldManteinanceAction->file1 ;
            $manteinanceAction->file_2 = $oldManteinanceAction->file2 ;
            $manteinanceAction->file_3 = $oldManteinanceAction->file3 ;
            $manteinanceAction->file_4 = $oldManteinanceAction->file4 ;
            $manteinanceAction->file_5 = $oldManteinanceAction->file5 ;
            $manteinanceAction->status = $oldManteinanceAction->estado ;
            $manteinanceAction->type_1 = $oldManteinanceAction->tipo1 ;
            $manteinanceAction->type_2 = $oldManteinanceAction->tipo2 ;
            $manteinanceAction->type_3 = $oldManteinanceAction->tipo3 ;
            $manteinanceAction->type_4 = $oldManteinanceAction->tipo4 ;
            $manteinanceAction->type_5 = $oldManteinanceAction->tipo5 ;
            $manteinanceAction->payment_status = $oldManteinanceAction->mantenimiento_estado_pago ;
            $manteinanceAction->advance = $oldManteinanceAction->adelanto ;
            $manteinanceAction->confirmation_email_required = $oldManteinanceAction->requiere_mail_confirmacion ;
            $manteinanceAction->save();
            $iManteinanceActions++;
        }

        $oldManteinanceActionAssignations = OldManteinanceActionAssignation::all();
        $iManteinanceActionAssignations = 0;

        foreach($oldManteinanceActionAssignations as $oldManteinanceActionAssignation){
            $manteinanceActionAssignation = new ManteinanceActionAssignation();
            $manteinanceActionAssignation->id = $oldManteinanceActionAssignation->asignacionmid ;
            if($oldManteinanceActionAssignation->usuarioid != 0 && $oldManteinanceActionAssignation->usuarioid != null && User::where('id',$oldManteinanceActionAssignation->usuarioid)->first()){
                $manteinanceActionAssignation->user_id = $oldManteinanceActionAssignation ->usuarioid ;
            }
            if($oldManteinanceActionAssignation->mantenimientoid != 0 && $oldManteinanceActionAssignation->mantenimientoid != null && ManteinanceAction::where('id',$oldManteinanceActionAssignation->mantenimientoid)->first()){
                $manteinanceActionAssignation->manteinance_action_id = $oldManteinanceActionAssignation->mantenimientoid ;
            }
            $manteinanceActionAssignation->number = $oldManteinanceActionAssignation->numero ;
            $manteinanceActionAssignation->status = $oldManteinanceActionAssignation->estado ;
            $manteinanceActionAssignation->manteinance_action_confirmation_date = $oldManteinanceActionAssignation->fecha_aceptacion_mantenimiento ;
            $manteinanceActionAssignation->customer_confitmation_date = $oldManteinanceActionAssignation->fecha_aceptacion_cliente ;
            $manteinanceActionAssignation->save();

            $iManteinanceActionAssignations++;
        }


        $oldCleannings = OldCleanning::all();
        $iCleannings = 0;

        foreach($oldCleannings as $oldCleanning){
            $cleanning = new Cleanning();
            $cleanning->id = $oldCleanning->limpiezaid ;
            if($oldCleanning->pisoid != 0 && $oldCleanning->pisoid != null && Property::where('id',$oldCleanning->pisoid)->first()){
                $cleanning->property_id = $oldCleanning->pisoid ;
            }
            $cleanning->mrh_cost = $oldCleanning->coste_mrh ;
            $cleanning->customer_price = $oldCleanning->precio_cliente ;
            $cleanning->type = $oldCleanning->tipo ;
            $cleanning->comment = $oldCleanning->comentario != null ? $oldCleanning->comentario :''  ;
            $cleanning->date = $oldCleanning->fecha ;
            $cleanning->hour = $oldCleanning->hora ;
            $cleanning->month = $oldCleanning->mes ;
            if($oldCleanning->clienteid != 0 && $oldCleanning->clienteid != null && Customer::where('id',$oldCleanning->clienteid)->first()){
                $cleanning->customer_id = $oldCleanning->clienteid ;
            }
            $cleanning->summary_comment = $oldCleanning->comment_resumen != null ?$oldCleanning->comment_resumen :''  ;
            $cleanning->save();

            $iCleannings++;
        }


        $oldCleanningAssignations = OldCleanningAssignation::all();
        $iCleanningAssignations = 0;

        foreach($oldCleanningAssignations as $oldCleanningAssignation){
            $cleanningAssignation = new CleanningAssignation();
            $cleanningAssignation->id = $oldCleanningAssignation->asignacionlid ;
            if($oldCleanningAssignation->usuario != 0 && $oldCleanningAssignation->usuario != null && User::where('id',$oldCleanningAssignation->usuario)->first()){
                $cleanningAssignation->user_id = $oldCleanningAssignation->usuario ;
            }
            if($oldCleanningAssignation->limpiezaid != 0 && $oldCleanningAssignation->limpiezaid != null && Cleanning::where('id',$oldCleanningAssignation->limpiezaid)->first()){
                $cleanningAssignation->cleanning_id = $oldCleanningAssignation->limpiezaid ;
            }
            $cleanningAssignation->number = $oldCleanningAssignation->numero ;
            $cleanningAssignation->status = $oldCleanningAssignation->estado ;

            $cleanningAssignation->save();  

            $iCleanningAssignations++;
        }




        return  $iCheckin.' asignaciones checkin migradas a v2 \n '.
                $iCheckout.' asignaciones checkout migradas a v2 \n '.
                $iManteinanceActions.' Mantenimientos migrados a v2 \n '.
                $iManteinanceActionAssignations.' Assignaciones de Mantenimientos migrados a v2 \n '.
                $iCleannings.' Cleannings migrados a v2 \n '
        ;
    }
}
