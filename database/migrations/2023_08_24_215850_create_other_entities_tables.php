<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherEntitiesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('number')->nullable();
            $table->string('year')->nullable();
            $table->string('ordenation')->nullable();
            $table->string('date')->nullable();
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('financial_files', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('month')->nullable();
            $table->string('filename')->nullable();
            $table->string('generated_at')->nullable();
            $table->longText('invoice_concept')->nullable();
            $table->string('campo1')->nullable();
            $table->string('iva_amount')->nullable();
            $table->string('enterprise')->nullable();
            $table->string('sent_at')->nullable();
            $table->string('charged_at')->nullable();
            $table->string('invoice_date')->nullable();
            $table->string('status')->nullable();
            $table->string('total')->nullable();
            $table->longText('observations');
            $table->integer('customer_id')->nullable()->unsigned();
            $table->foreign('customer_id')->nullable()->references('id')->on('customers')->onDelete('cascade');
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('invoice_number_id')->nullable()->unsigned();
            $table->foreign('invoice_number_id')->nullable()->references('id')->on('invoice_numbers')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('reservation_files', function (Blueprint $table) {
            $table->id();
            $table->longText('notes');
            $table->string('filetype')->nullable();
            $table->string('file')->nullable();
            $table->unsignedBigInteger('reservation_id')->nullable()->unsigned();
            $table->foreign('reservation_id')->nullable()->references('id')->on('reservations')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('surname2')->nullable();
            $table->string('gender')->nullable();
            $table->string('document_type')->nullable();
            $table->string('document_number')->nullable();
            $table->string('expedition_date')->nullable();
            $table->string('nationality')->nullable();
            $table->string('birthday')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('file')->nullable();
            $table->unsignedBigInteger('reservation_id')->nullable()->unsigned();
            $table->foreign('reservation_id')->nullable()->references('id')->on('reservations')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('title')->nullable();
            $table->string('cost')->nullable();
            $table->longText('description');
            $table->string('attachment')->nullable();
            $table->integer('property_id')->nullable()->unsigned();
            $table->foreign('property_id')->nullable()->references('id')->on('properties')->onDelete('cascade');
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('holder_name')->nullable();
            $table->string('holder_dni')->nullable();
            $table->string('holder_address')->nullable();
            $table->string('holder_phone')->nullable();
            $table->string('contracted_service')->nullable();
            $table->string('client_number')->nullable();
            $table->longText('notes');
            $table->integer('property_id')->nullable()->unsigned();
            $table->foreign('property_id')->nullable()->references('id')->on('properties')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('from')->nullable();
            $table->string('to_1')->nullable();
            $table->string('to_2')->nullable();
            $table->string('to_3')->nullable();
            $table->string('subject')->nullable();
            $table->longText('body');
            $table->string('success')->nullable();
            $table->string('priority')->nullable();
            $table->string('max_attempts')->nullable();
            $table->string('attempts')->nullable();
            $table->string('register_date')->nullable();
            $table->string('scheluded_date')->nullable();
            $table->string('last_attempt')->nullable();
            $table->string('sent_date')->nullable();
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
        Schema::dropIfExists('finance_files');
        Schema::dropIfExists('invoice_numbers');
        Schema::dropIfExists('reservation_file');
        Schema::dropIfExists('guests');
        Schema::dropIfExists('events');
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('mails');


    }
}
