<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Entities\Income;
use App\Entities\Old\OldIncome;
use App\Entities\GeneralExpenseMonthGroup;
use App\Entities\Old\OldGeneralExpenseMonthGroup;
use App\Entities\GeneralExpenseType;
use App\Entities\Old\OldGeneralExpenseType;
use App\Entities\GeneralExpense;
use App\Entities\Old\OldGeneralExpense;
use App\Entities\PeriodicPropertyExpense;
use App\Entities\Old\OldPeriodicPropertyExpense;
use App\Entities\PunctualPropertyExpense;
use App\Entities\Old\OldPunctualPropertyExpense;
use App\Entities\Property;
use App\Entities\Pack;
use App\Entities\Customer;
use App\Entities\User;
use App\Entities\Reservation;


class MigrateIncomesAndExpensesToV2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mrh:migrate-incomes-and-expenses-to-v2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '05 - Migrates Incomes and Expenses';

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
       


        $oldIncomes = OldIncome::all();
        $iIncomes = 0;

        foreach($oldIncomes as $oldIncome){
            $income = new Income();
            $income->id = $oldIncome->incomeid ;
            $income->concept = $oldIncome->concepto != null ? $oldIncome->concepto: '' ;
            $income->amount = $oldIncome->cantidad ;
            $income->date = $oldIncome->fecha ;
            $income->month = $oldIncome->mes ;
            if($oldIncome->clienteid != 0 && $oldIncome->clienteid != null && Customer::where('id',$oldIncome->clienteid)->first()){
                $income->customer_id = $oldIncome->clienteid ;
            }
            if($oldIncome->usuarioid != 0 && $oldIncome->usuarioid != null && User::where('id',$oldIncome->usuarioid)->first()){
                $income->user_id = $oldIncome->usuarioid ;
            }
            if($oldIncome->reservaid != 0 && $oldIncome->reservaid != null && Reservation::where('id',$oldIncome->reservaid)->first()){
                $income->reservation_id = $oldIncome->reservaid ;
            }
            if($oldIncome->pisoid != 0 && $oldIncome->pisoid != null && Property::where('id',$oldIncome->pisoid)->first()){
                $income->property_id = $oldIncome->pisoid ;
            }

            $income->save();

            $iIncomes++;
        }


        $oldGeneralExpenseMonthGroups = OldGeneralExpenseMonthGroup::all();
        $iGeneralExpenseMonthGroups = 0;

        foreach($oldGeneralExpenseMonthGroups as $oldGeneralExpenseMonthGroup){
            $generalExpenseMonthGroup = new GeneralExpenseMonthGroup();
            $generalExpenseMonthGroup->id = $oldGeneralExpenseMonthGroup->mes_ggastoid ;
            $generalExpenseMonthGroup->month = $oldGeneralExpenseMonthGroup->mes ;
            $generalExpenseMonthGroup->date = $oldGeneralExpenseMonthGroup->fecha ;
            if($oldGeneralExpenseMonthGroup->usuarioid != 0 && $oldGeneralExpenseMonthGroup->usuarioid != null && User::where('id',$oldGeneralExpenseMonthGroup->usuarioid)->first()){
                $generalExpenseMonthGroup->user_id = $oldGeneralExpenseMonthGroup->usuarioid ;
            }
            $generalExpenseMonthGroup->deleted = $oldGeneralExpenseMonthGroup->borrado ;
            $generalExpenseMonthGroup->total = $oldGeneralExpenseMonthGroup->total ;
            $generalExpenseMonthGroup->year = $oldGeneralExpenseMonthGroup->ano ;
            $generalExpenseMonthGroup->save();

            $iGeneralExpenseMonthGroups++;
        }


        $oldGeneralExpenseTypes = OldGeneralExpenseType::all();
        $iGeneralExpenseTypes = 0;

        foreach($oldGeneralExpenseTypes as $oldGeneralExpenseType){
            $generalExpenseType = new GeneralExpenseType();
            $generalExpenseType->id = $oldGeneralExpenseType->tipo_ggastoid ;
            $generalExpenseType->name = $oldGeneralExpenseType->nombre ;
            $generalExpenseType->value = $oldGeneralExpenseType->valor ;
            $generalExpenseType->mrh_cost = $oldGeneralExpenseType->costo_mrh ;
            $generalExpenseType->save();

            $iGeneralExpenseTypes++;
        }


        $oldGeneralExpenses = OldGeneralExpense::all();
        $iGeneralExpenses = 0;

        foreach($oldGeneralExpenses as $oldGeneralExpense){
            $generalExpense = new GeneralExpense();
            $generalExpense->id = $oldGeneralExpense->ggastoid ;
            $generalExpense->name = $oldGeneralExpense->nombre ;
            $generalExpense->value = $oldGeneralExpense->valor ;
            $generalExpense->mrh_cost = $oldGeneralExpense->costo_mrh ;
            $generalExpense->general_expense_type_id = $oldGeneralExpense->tipo_ggastoid ;
            $generalExpense->general_expense_month_group_id = $oldGeneralExpense->mes_ggastoid ;
            $generalExpense->month = $oldGeneralExpense->mes ;
            $generalExpense->date = $oldGeneralExpense->fecha ;
            $generalExpense->year = $oldGeneralExpense->ano ;

            $generalExpense->save();

            $iGeneralExpenses++;
        }

        $oldPeriodicPropertyExpenses = OldPeriodicPropertyExpense::all();
        $iPeriodicPropertyExpenses = 0;

        foreach($oldPeriodicPropertyExpenses as $oldPeriodicPropertyExpense){
            $periodicPropertyExpense = new PeriodicPropertyExpense();
            $periodicPropertyExpense->id = $oldPeriodicPropertyExpense->pgastoid ;
            $periodicPropertyExpense->name = $oldPeriodicPropertyExpense->nombre ;
            $periodicPropertyExpense->quantity = $oldPeriodicPropertyExpense->cantidad ;
            $periodicPropertyExpense->date = $oldPeriodicPropertyExpense->fecha ;
            $periodicPropertyExpense->mrh_cost = $oldPeriodicPropertyExpense->costo_mrh ;
            $periodicPropertyExpense->january = $oldPeriodicPropertyExpense->enero ;
            $periodicPropertyExpense->february = $oldPeriodicPropertyExpense->febrero ;
            $periodicPropertyExpense->march = $oldPeriodicPropertyExpense->marzo ;
            $periodicPropertyExpense->april = $oldPeriodicPropertyExpense->abril ;
            $periodicPropertyExpense->may = $oldPeriodicPropertyExpense->mayo ;
            $periodicPropertyExpense->june = $oldPeriodicPropertyExpense->junio ;
            $periodicPropertyExpense->july = $oldPeriodicPropertyExpense->julio ;
            $periodicPropertyExpense->august = $oldPeriodicPropertyExpense->agosto ;
            $periodicPropertyExpense->september = $oldPeriodicPropertyExpense->septiembre ;
            $periodicPropertyExpense->october = $oldPeriodicPropertyExpense->octubre ;
            $periodicPropertyExpense->november = $oldPeriodicPropertyExpense->noviembre ;
            $periodicPropertyExpense->december = $oldPeriodicPropertyExpense->diciembre ;
            if($oldPeriodicPropertyExpense->pisoid != 0 && $oldPeriodicPropertyExpense->pisoid != null && Property::where('id',$oldPeriodicPropertyExpense->pisoid)->first()){
                $periodicPropertyExpense->property_id = $oldPeriodicPropertyExpense->pisoid ;
            }
            if($oldPeriodicPropertyExpense->usuarioid != 0 && $oldPeriodicPropertyExpense->usuarioid != null && User::where('id',$oldPeriodicPropertyExpense->usuarioid)->first()){
                $periodicPropertyExpense->user_id = $oldPeriodicPropertyExpense->usuarioid ;
            }
            $periodicPropertyExpense->save();

            $iPeriodicPropertyExpenses++;
        }
        
        $oldPunctualPropertyExpenses = OldPunctualPropertyExpense::all();
        $iPunctualPropertyExpenses = 0;

        foreach($oldPunctualPropertyExpenses as $oldPunctualPropertyExpense){
            $punctualPropertyExpense = new PunctualPropertyExpense();
            $punctualPropertyExpense->id = $oldPunctualPropertyExpense->ogastoid ;
            $punctualPropertyExpense->concept = $oldPunctualPropertyExpense->concepto !== null ? $oldPunctualPropertyExpense->concepto : '' ;
            $punctualPropertyExpense->quantity = $oldPunctualPropertyExpense->cantidad ;
            $punctualPropertyExpense->date = $oldPunctualPropertyExpense->fecha ;
            $punctualPropertyExpense->mrh_cost = $oldPunctualPropertyExpense->costo_mrh ;
            $punctualPropertyExpense->month = $oldPunctualPropertyExpense->mes ;
            $punctualPropertyExpense->file = $oldPunctualPropertyExpense->file ;
            if($oldPunctualPropertyExpense->pisoid != 0 && $oldPunctualPropertyExpense->pisoid != null && Property::where('id',$oldPunctualPropertyExpense->pisoid)->first()){
                $punctualPropertyExpense->property_id = $oldPunctualPropertyExpense->pisoid ;
            }
            if($oldPunctualPropertyExpense->usuarioid != 0 && $oldPunctualPropertyExpense->usuarioid != null && User::where('id',$oldPunctualPropertyExpense->usuarioid)->first()){
                $punctualPropertyExpense->user_id = $oldPunctualPropertyExpense->usuarioid ;
            }
            $punctualPropertyExpense->save();

            $iPunctualPropertyExpenses++;
        }

        return  $iIncomes.' icomes migrados a v2 \n '.
        $iGeneralExpenseMonthGroups.' grupos mensuales de gastos generales migrados a v2 \n '.
        $iGeneralExpenseTypes.' Typos de gastos generales migrados a v2 \n '.
        $iGeneralExpenses.' Gastos generales migrados a v2 \n '.
        $iPeriodicPropertyExpenses.' Gastos de piso periodicos migrados a v2 \n '.
        $iPunctualPropertyExpenses.' Gastos puntuales de piso migrados a v2 \n '

        ;
    }
}
