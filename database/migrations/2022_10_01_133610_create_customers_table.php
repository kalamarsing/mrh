<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('percent');
            $table->string('fixed');
            $table->timestamps();
        });
      /*  "cliente" => array('db_attributes' => array("OBJECT", "HASMANY")),
        "reserva" => array('db_attributes' => array("OBJECT", "HASMANY")),*/


        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('password');
            $table->string('public_password');
            $table->string('type');
            $table->string('dni');
            $table->string('phone');
            $table->string('mobile');
            $table->longText('address');
            $table->string('postal_code');
            $table->string('city');
            $table->string('province');
            $table->string('account');
            $table->string('bank');
            $table->longText('comments');
            $table->string('image');
            $table->boolean('active')->default(0);
            $table->string('bank_address')->nullable();
            $table->string('swift_code')->nullable();
            $table->longText('billing_concept')->nullable();
            $table->string('billing_name')->nullable();
            $table->string('billing_nif')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_postal_code')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_country')->nullable();
            $table->string('billing_logo')->nullable();
            $table->string('billing_amount')->nullable();
            $table->string('billing_email')->nullable();
            $table->integer('billing_required')->default(0);
            $table->string('billing_email2')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('birthday')->nullable();
            $table->string('extra_phone')->nullable();
            $table->string('status')->nullable();
            $table->string('gen_password_status')->nullable();
            $table->integer('irpf')->default(0);
            $table->integer('iva')->default(0);
            $table->integer('new_reservation_email')->default(0);
            $table->integer('pack_id')->nullable()->unsigned();
            $table->foreign('pack_id')->nullable()->references('id')->on('packs')->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('address');
            $table->string('capacity');
            $table->longText('comments');
            $table->integer('customer_id')->nullable()->unsigned();
            $table->foreign('customer_id')->nullable()->references('id')->on('customers')->onDelete('cascade');
            $table->integer('number');
            $table->integer('pack_id')->nullable()->unsigned();
            $table->foreign('pack_id')->nullable()->references('id')->on('packs')->onDelete('cascade');
            $table->string('airbnb_name');
            $table->string('map_url');
            $table->string('guest_cleanning_price');
            $table->string('guest_checkin_price');
            $table->string('guest_checkout_price');
            $table->string('guest_pickup_shuttle_price');
            $table->string('guest_return_shuttle_price');
            $table->string('guest_internet_price');
            $table->string('guest_basket_food_price');
            $table->string('guest_parking_price');
            $table->string('guest_cleanning_without_cloth_price');
            $table->string('guest_cleanning_with_cloth_price');
            $table->string('mrh_cleanning_cost');
            $table->string('mrh_checkin_cost');
            $table->string('mrh_checkout_cost');
            $table->string('mrh_pickup_shuttle_cost');
            $table->string('mrh_return_shuttle_cost');
            $table->string('mrh_internet_cost');
            $table->string('mrh_basket_food_cost');
            $table->string('mrh_parking_cost');
            $table->string('mrh_cleanning_without_cloth_cost');
            $table->string('mrh_cleanning_with_cloth_cost');
            $table->string('cleanning_time');
            $table->integer('default_assignation1_id')->nullable();
            $table->integer('default_assignation2_id')->nullable();
            $table->integer('default_assignation3_id')->nullable();
            $table->string('inventory_file');
            $table->string('licence_number');
            $table->string('minimum_reservation_price');
            $table->string('status');
            $table->integer('active')->default(0);
            $table->integer('police')->default(0);
            $table->string('airbnb_listing_1');
            $table->string('airbnb_listing_2');
            $table->string('airbnb_listing_3');
            $table->string('airbnb_extras');
            $table->longText('email_extras');
            $table->string('touristic_tax');
            $table->string('touristic_tax_value');
            $table->integer('laundry_id')->nullable()->unsigned();
            $table->foreign('laundry_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->longText('laundry_address_comment');
            $table->string('laundry_pack_price');
            $table->timestamps();
        });


       Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file');
            $table->longText('notes');
            $table->string('document_date');
            $table->string('upload_date');
            $table->string('type');
            $table->integer('customer_id')->nullable()->unsigned();
            $table->foreign('customer_id')->nullable()->references('id')->on('customers')->onDelete('cascade');
            $table->integer('property_id')->nullable()->unsigned();
            $table->foreign('property_id')->nullable()->references('id')->on('properties')->onDelete('cascade');
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
        Schema::dropIfExists('documents');
        Schema::dropIfExists('properties');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('packs');
    }
}
