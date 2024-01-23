<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('');
            $table->string('sent_at')->default('0');
            $table->string('filled_at')->default('0');
            $table->string('total')->default('0');
            $table->string('advance')->default('0');
            $table->string('remaining')->default('0');
            $table->string('payment_method')->default('');
            $table->string('payment_status')->default('');
            $table->string('payment_id')->default('');
            $table->string('arrival_transport')->default('');
            $table->string('arrival_shuttle_required')->default('');
            $table->string('arrival_transport_number')->default('');
            $table->string('arrival_terminal')->default('');
            $table->string('arrival_date')->default('');
            $table->string('arrival_form')->default('');
            $table->string('arrival_destination_property')->default('');
            $table->string('arrival_transport_company')->default('');
            $table->string('arrival_shuttle_num_people')->default('');
            $table->longText('arrival_shuttle_comments');
            $table->string('departure_shuttle_required')->default('');
            $table->string('arrival_shuttle_total')->default('0');
            $table->string('departure_airport')->default('');
            $table->string('departure_transport_number')->default('');
            $table->string('departure_terminal')->default('');
            $table->string('departure_transport_company')->default('');
            $table->string('departure_shuttle_total')->default('0');
            $table->string('departure_date')->default('');
            $table->string('departure_shuttle_num_people')->default('0');
            $table->string('shuttle_total')->default('0');
            $table->string('parking_required')->default('');
            $table->string('parking_total')->default('0');
            $table->string('property_arrival_estimated_time')->default('');
            $table->string('checkin_time')->default('');
            $table->string('checkout_time')->default('');
            $table->string('total_checkin_late')->default('0');
            $table->longText('comments');
            $table->integer('reservation_id')->nullable();
            $table->integer('food_essential_pack')->default('0');
            $table->integer('food_gourmet_pack')->default('0');
            $table->integer('food_wine_pack')->default('0');
            $table->integer('food_soft_pack')->default('0');
            $table->longText('food_comments');
            $table->string('food_total')->default('0');
            $table->string('total_extras')->nullable();
            $table->timestamps();
        });

        Schema::create('form_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('position');
            $table->string('active');
            $table->string('icon');
            $table->timestamps();
        });

        Schema::create('form_products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('position');
            $table->string('file');
            $table->unsignedBigInteger('form_category_id')->unsigned()->index();
            $table->foreign('form_category_id')->references('id')->on('form_categories')->onDelete('cascade');
            $table->string('price');
            $table->string('active');
            $table->string('cost');
            $table->longText('more_info')->nullable();
            $table->integer('parent_id')->nullable()->unsigned();
            $table->timestamps();
        });

        Schema::create('buyed_form_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_product_id')->nullable()->unsigned();
            $table->foreign('form_product_id')->nullable()->references('id')->on('form_products')->onDelete('cascade');
            $table->string('price');
            $table->string('cost');
            $table->unsignedBigInteger('form_id')->nullable()->unsigned();
            $table->foreign('form_id')->nullable()->references('id')->on('forms')->onDelete('cascade');
            $table->integer('subproduct')->nullable()->unsigned();
            $table->timestamps();
        });

        Schema::create('property_form_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_product_id')->nullable()->unsigned();
            $table->foreign('form_product_id')->nullable()->references('id')->on('form_products')->onDelete('cascade');
            $table->integer('property_id')->nullable()->unsigned();
            $table->foreign('property_id')->nullable()->references('id')->on('properties')->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('booking_number');
            $table->string('host_name');
            $table->string('persons');
            $table->string('web');
            $table->string('date_in');
            $table->string('date_out');
            $table->integer('days');
            $table->string('rental_income');
            $table->string('checkin');
            $table->string('checkin_price');
            $table->string('checkout');
            $table->string('checkout_price');
            $table->string('shuttle_pickup');
            $table->string('shuttle_pickup_price');
            $table->string('shuttle_return')->nullable();
            $table->string('shuttle_return_price');
            $table->string('internet');
            $table->string('internet_price');
            $table->string('replacement_extras');
            $table->string('replacement_extras_price');
            $table->string('income_destination');
            $table->string('month');
            $table->string('resetvation_date');
            $table->integer('property_id')->nullable()->unsigned();
            $table->foreign('property_id')->nullable()->references('id')->on('properties')->onDelete('cascade');
            $table->integer('pack_id')->nullable()->unsigned();
            $table->foreign('pack_id')->nullable()->references('id')->on('packs')->onDelete('cascade');
            $table->integer('customer_id')->nullable()->unsigned();
            $table->foreign('customer_id')->nullable()->references('id')->on('customers')->onDelete('cascade');
            $table->integer('user_id')->nullable()->unsigned();
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('cleanning');
            $table->string('cleanning_price');
            $table->longText('comments');
            $table->string('passport');
            $table->string('file');
            $table->string('host_email');
            $table->string('host_phone');
            $table->string('reservation_code');
            $table->unsignedBigInteger('form_id')->nullable()->unsigned();
            $table->foreign('form_id')->nullable()->references('id')->on('forms')->onDelete('cascade');
            $table->string('form_status');
            $table->string('email_customer_status');
            $table->string('night_price');
            $table->string('basket');
            $table->string('basket_price');
            $table->string('parking');
            $table->string('parking_price');
            $table->string('mrh_cleanning_cost');
            $table->string('mrh_checkin_cost');
            $table->string('mrh_checkout_cost');
            $table->string('mrh_shuttle_pickup_cost');
            $table->string('mrh_shuttle_return_cost');
            $table->string('mrh_replacement_extras_cost');
            $table->string('mrh_basket_cost');
            $table->string('mrh_parking_cost');
            $table->string('checkin_time');
            $table->string('checkin_payment_status');
            $table->string('cleanning_payment_status');
            $table->string('checkout_time');
            $table->string('num_people_in_arrival_car')->nullable();
            $table->string('num_people_in_return_car')->nullable();
            $table->string('airbnb_total_nights')->nullable();
            $table->string('airbnb_extras')->nullable();
            $table->string('airbnb_service_fee')->nullable();
            $table->longText('cleanning_comments');
            $table->longText('checkin_comments');
            $table->string('extras')->nullable();
            $table->string('extras_price')->nullable();
            $table->string('mrh_extras_cost')->nullable();
            $table->string('touristic_tax')->nullable();
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
        Schema::dropIfExists('reservations');
        Schema::dropIfExists('property_form_products');
        Schema::dropIfExists('buyed_form_products');
        Schema::dropIfExists('form_products');
        Schema::dropIfExists('form_categories');
        Schema::dropIfExists('forms');

    }
}
