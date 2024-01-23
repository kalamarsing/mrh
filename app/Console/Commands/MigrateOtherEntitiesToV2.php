<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Entities\InvoiceNumber;
use App\Entities\Old\OldInvoiceNumber;
use App\Entities\FinancialFile;
use App\Entities\Old\OldFinancialFile;
use App\Entities\ReservationFile;
use App\Entities\Old\OldReservationFile;
use App\Entities\Guest;
use App\Entities\Old\OldGuest;
use App\Entities\Event;
use App\Entities\Old\OldEvent;
use App\Entities\Supplier;
use App\Entities\Old\OldSupplier;
use App\Entities\Mail;
use App\Entities\Old\OldMail;
use App\Entities\Property;
use App\Entities\Pack;
use App\Entities\Customer;
use App\Entities\User;
use App\Entities\Reservation;

class MigrateOtherEntitiesToV2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mrh:migrate-other-entities-to-v2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '05 - Migrates rest of entities to V2 ';

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
       
        $oldInvoiceNumbers = OldInvoiceNumber::all();
        $iInvoiceNumbers = 0;

        foreach($oldInvoiceNumbers as $oldInvoiceNumber){
            $invoiceNumber = new InvoiceNumber();
            $invoiceNumber->id = $oldInvoiceNumber->num_facturaid ;
            $invoiceNumber->number = $oldInvoiceNumber->numero ;
            $invoiceNumber->year = $oldInvoiceNumber->any ;
            $invoiceNumber->ordenation = $oldInvoiceNumber->ordenation ;
            $invoiceNumber->date = $oldInvoiceNumber->fecha ;
            if($oldInvoiceNumber->usuarioid != 0 && $oldInvoiceNumber->usuarioid != null && User::where('id',$oldInvoiceNumber->usuarioid)->first()){
                $invoiceNumber->user_id = $oldInvoiceNumber->usuarioid ;
            }
            $invoiceNumber->save();

            $iInvoiceNumbers++;
        }

        $oldReservationFiles = OldReservationFile::all();
        $iReservationFiles = 0;

        foreach($oldReservationFiles as $oldReservationFile){
            $reservationFile = new ReservationFile();
            $reservationFile->id = $oldReservationFile->rfileid ;
            $reservationFile->notes = $oldReservationFile->notas !== null ?$oldReservationFile->notas : '';
            $reservationFile->filetype = $oldReservationFile->filetype ;
            $reservationFile->file = $oldReservationFile->file ;
            if($oldReservationFile->reservaid != 0 && $oldReservationFile->reservaid != null && Reservation::where('id',$oldReservationFile->reservaid)->first()){
                $reservationFile->reservation_id = $oldReservationFile->reservaid ;
            }
            $reservationFile->save();

            $iReservationFiles++;
        }


        $oldGuests = OldGuest::all();
        $iGuests = 0;

        foreach($oldGuests as $oldGuest){
            $guest = new Guest();
            $guest->id = $oldGuest->huespedid ;
            $guest->name = $oldGuest->nombre ;
            $guest->surname = $oldGuest->apellido ;
            $guest->surname2 = $oldGuest->apellido2 ;
            $guest->gender = $oldGuest->sexo ;
            $guest->document_type = $oldGuest->tipo_documento ;
            $guest->document_number = $oldGuest->num_documento ;
            $guest->expedition_date = $oldGuest->fecha_expedicion ;
            $guest->nationality = $oldGuest->nacionalidad ;
            $guest->birthday = $oldGuest->fecha_nacimiento ;
            $guest->address = $oldGuest->domicilio ;
            $guest->phone = $oldGuest->telefono ;
            $guest->file = $oldGuest->file ;
            if($oldGuest->reservaid != 0 && $oldGuest->reservaid != null && Reservation::where('id',$oldGuest->reservaid)->first()){
                $guest->reservation_id = $oldGuest->reservaid ;
            }
            $guest->save();

            $iGuests++;
        }

        $oldEvents = OldEvent::all();
        $iEvents = 0;

        foreach($oldEvents as $oldEvent){
            $event = new Event();
            $event->id = $oldEvent->historiaid ;
            $event->date = $oldEvent->fecha ;
            $event->title = $oldEvent->suceso ;
            $event->cost = $oldEvent->costo ;
            $event->description = $oldEvent->notas !== null ?$oldEvent->notas : '';
            $event->attachment = $oldEvent->datos_adjuntos ;
            if($oldEvent->pisoid != 0 && $oldEvent->pisoid != null && Property::where('id',$oldEvent->pisoid)->first()){
                $event->property_id = $oldEvent->pisoid ;
            }
            if($oldEvent->usuarioid != 0 && $oldEvent->usuarioid != null && User::where('id',$oldEvent->usuarioid)->first()){
                $event->user_id = $oldEvent->usuarioid ;
            }

            $event->save();

            $iEvents++;
        }

        $oldSuppliers = OldSupplier::all();
        $iSuppliers = 0;

        foreach($oldSuppliers as $oldSupplier){
            $supplier = new Supplier();
            $supplier->id = $oldSupplier->proveedorid ;
            $supplier->name = $oldSupplier->nombre_proveedor ;
            $supplier->phone = $oldSupplier->telefono_at_cliente ;
            $supplier->holder_dni = $oldSupplier->dni_titular ;
            $supplier->holder_name = $oldSupplier->nombre_titular ;
            $supplier->holder_address = $oldSupplier->direccion_titular ;
            $supplier->holder_phone = $oldSupplier->telefono_titular ;
            $supplier->contracted_service = $oldSupplier->servicio_contratado ;
            $supplier->client_number = $oldSupplier->numero_cliente ;
            $supplier->notes = $oldSupplier->notas !== null ? $oldSupplier->notas : '' ;
            if($oldSupplier->pisoid != 0 && $oldSupplier->pisoid != null && Property::where('id',$oldSupplier->pisoid)->first()){
                $supplier->property_id = $oldSupplier->pisoid ;
            }
            $supplier->save();

            $iSuppliers++;
        }

        
        $oldMails = OldMail::all();
        $iMails = 0;

        foreach($oldMails as $oldMail){
            $mail = new Mail();
            $mail->id = $oldMail->emailsid ;
            $mail->type = $oldMail->tipo ;
            $mail->from = $oldMail->email_origen ;
            $mail->to_1 = $oldMail->email_destino_1 ;
            $mail->to_2 = $oldMail->email_destino_2 ;
            $mail->to_3 = $oldMail->email_destino_3 ;
            $mail->subject = $oldMail->asunto ;
            $mail->body = $oldMail->texto  !== null ? $oldMail->texto: '';
            $mail->success = $oldMail->success ;
            $mail->priority = $oldMail->priority ;
            $mail->max_attempts = $oldMail->max_attempts ;
            $mail->attempts = $oldMail->attempts ;
            $mail->register_date = $oldMail->register_date ;
            $mail->scheluded_date = $oldMail->scheluded_date ;
            $mail->last_attempt = $oldMail->last_attempt ;
            $mail->sent_date = $oldMail->sent_date ;
            $mail->save();

            $iMails++;
        }


        $oldFinanceFiles = OldFinancialFile::all();
        $iFinanceFiles = 0;

        foreach($oldFinanceFiles as $oldFinanceFile){
            $financeFile = new FinancialFile();
            $financeFile->id = $oldFinanceFile->ficheroid ;
            $financeFile->type = $oldFinanceFile->tipo ;
            $financeFile->month = $oldFinanceFile->mes ;
            if($oldFinanceFile->clienteid != 0 && $oldFinanceFile->clienteid != null && Customer::where('id',$oldFinanceFile->clienteid)->first()){
                $financeFile->customer_id = $oldFinanceFile->clienteid ;
            }
            $financeFile->filename = $oldFinanceFile->filename ;
            if($oldFinanceFile->usuarioid != 0 && $oldFinanceFile->usuarioid != null && User::where('id',$oldFinanceFile->usuarioid)->first()){
                $financeFile->user_id = $oldFinanceFile->usuarioid ;
            }
            $financeFile->generated_at = $oldFinanceFile->fecha_generacion;
            $financeFile->invoice_concept = $oldFinanceFile->concepto_factura !== null ? $oldFinanceFile->concepto_factura: '';
            $financeFile->campo1 = $oldFinanceFile->campo1 ;
            $financeFile->iva_amount = $oldFinanceFile->campo2 ;
            $financeFile->enterprise = $oldFinanceFile->campo3 ;
            $financeFile->sent_at = $oldFinanceFile->fecha_enviado ;
            $financeFile->charged_at = $oldFinanceFile->fecha_cobrado ;
            $financeFile->invoice_date = $oldFinanceFile->fecha_factura ;
            $financeFile->status = $oldFinanceFile->status ;
            $financeFile->total = $oldFinanceFile->total ;
            $financeFile->observations = $oldFinanceFile->observaciones !== null ? $oldFinanceFile->observaciones: '' ;
            if($oldFinanceFile->num_facturaid != 0 && $oldFinanceFile->num_facturaid != null && InvoiceNumber::where('id',$oldFinanceFile->num_facturaid)->first()){
                $financeFile->invoice_number_id = $oldFinanceFile->num_facturaid ;
            }
            $financeFile->save();

            $iFinanceFiles++;
        }
     

        return  $iInvoiceNumbers.' numeros de facturas migrados a v2 \n '.
        $iFinanceFiles.' ficheros de finanzas migrados a v2 \n '.
        $iReservationFiles.' Ficheros de reservas migrados a v2 \n '.
        $iGuests.' Huespedes migrados a v2 \n '.
        $iEvents.' Eventos de piso migrados a v2 \n '.
        $iSuppliers.' PRoveedores de piso migrados a v2 \n '.        
        $iMails.'Emails migrados a v2 \n '
        ;
    }
}
