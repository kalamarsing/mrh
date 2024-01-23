<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesAndExpensesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->longText('concept')->nullable();
            $table->string('amount')->nullable();
            $table->string('date')->nullable();
            $table->string('month')->nullable();
            $table->integer('customer_id')->nullable()->unsigned();
            $table->foreign('customer_id')->nullable()->references('id')->on('customers')->onDelete('cascade');
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('reservation_id')->nullable()->unsigned();
            $table->foreign('reservation_id')->nullable()->references('id')->on('reservations')->onDelete('cascade');
            $table->integer('property_id')->nullable()->unsigned();
            $table->foreign('property_id')->nullable()->references('id')->on('properties')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('general_expense_month_groups', function (Blueprint $table) {
            $table->id();
            $table->string('month')->nullable();
            $table->string('date')->nullable();
            $table->string('deleted')->nullable();
            $table->string('total')->nullable();
            $table->string('year')->nullable();
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('general_expense_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('value')->nullable();
            $table->string('mrh_cost')->nullable();
            $table->timestamps();
        });

        Schema::create('general_expenses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('value')->nullable();
            $table->string('mrh_cost')->nullable();
            $table->string('month')->nullable();
            $table->string('date')->nullable();
            $table->string('year')->nullable();
            $table->unsignedBigInteger('general_expense_type_id')->nullable()->unsigned();
            $table->foreign('general_expense_type_id')->nullable()->references('id')->on('general_expense_types')->onDelete('cascade');
            $table->unsignedBigInteger('general_expense_month_group_id')->nullable()->unsigned();
            $table->foreign('general_expense_month_group_id')->nullable()->references('id')->on('general_expense_month_groups')->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('periodic_property_expenses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('quantity')->nullable();
            $table->string('date')->nullable();
            $table->string('mrh_cost')->nullable();
            $table->integer('january')->nullable();
            $table->integer('february')->nullable();
            $table->integer('march')->nullable();
            $table->integer('april')->nullable();
            $table->integer('may')->nullable();
            $table->integer('june')->nullable();
            $table->integer('july')->nullable();
            $table->integer('august')->nullable();
            $table->integer('september')->nullable();
            $table->integer('october')->nullable();
            $table->integer('november')->nullable();
            $table->integer('december')->nullable();
            $table->integer('property_id')->nullable()->unsigned();
            $table->foreign('property_id')->nullable()->references('id')->on('properties')->onDelete('cascade');
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('punctual_property_expenses', function (Blueprint $table) {
            $table->id();
            $table->longText('concept');
            $table->string('quantity')->nullable();
            $table->string('date')->nullable();
            $table->string('mrh_cost')->nullable();
            $table->string('month')->nullable();
            $table->string('file')->nullable();
            $table->integer('property_id')->nullable()->unsigned();
            $table->foreign('property_id')->nullable()->references('id')->on('properties')->onDelete('cascade');
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomes');
        Schema::dropIfExists('general_expenses');
        Schema::dropIfExists('general_expense_types');
        Schema::dropIfExists('general_expense_month_groups');
        Schema::dropIfExists('periodic_property_expenses');
        Schema::dropIfExists('punctual_property_expenses');

    }
}
