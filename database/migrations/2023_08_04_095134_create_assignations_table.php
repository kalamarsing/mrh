<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('checkin_assignations', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->nullable();
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('reservation_id')->nullable()->unsigned();
            $table->foreign('reservation_id')->nullable()->references('id')->on('reservations')->onDelete('cascade');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('checkout_assignations', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->nullable();
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('reservation_id')->nullable()->unsigned();
            $table->foreign('reservation_id')->nullable()->references('id')->on('reservations')->onDelete('cascade');
            $table->string('status')->nullable();
            $table->integer('laundry_id')->nullable()->unsigned();
         //   $table->foreign('laundry_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->string('delivery_time_init')->nullable();
            $table->string('delivery_time_end')->nullable();
            $table->string('delivery_price')->nullable();
            $table->string('delivery_amenities')->nullable();
            $table->longText('delivery_notes');
            $table->timestamps();
        });


        Schema::create('manteinance_actions', function (Blueprint $table) {
            $table->id();
            $table->integer('property_id')->nullable()->unsigned();
            $table->foreign('property_id')->nullable()->references('id')->on('properties')->onDelete('cascade');
            $table->integer('customer_id')->nullable()->unsigned();
            $table->foreign('customer_id')->nullable()->references('id')->on('customers')->onDelete('cascade');
            $table->string('material_cost')->nullable();
            $table->string('labour_cost')->nullable();
            $table->string('customer_price')->nullable();
            $table->string('name')->nullable();
            $table->longText('description');
            $table->string('init_date')->nullable();
            $table->string('init_time')->nullable();
            $table->string('month')->nullable();
            $table->string('mrh_total')->nullable();
            $table->string('end_date')->nullable();
            $table->string('end_time')->nullable();
            $table->longText('notes')->nullable();
            $table->string('position')->nullable();
            $table->string('status')->nullable();
            $table->string('file_1')->nullable();
            $table->string('file_2')->nullable();
            $table->string('file_3')->nullable();
            $table->string('file_4')->nullable();
            $table->string('file_5')->nullable();
            $table->string('type_1')->nullable();
            $table->string('type_2')->nullable();
            $table->string('type_3')->nullable();
            $table->string('type_4')->nullable();
            $table->string('type_5')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('advance')->nullable();
            $table->integer('confirmation_email_required')->default(0);
            $table->timestamps();
        });

        Schema::create('manteinance_action_assignations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('manteinance_action_id')->nullable()->unsigned();
            $table->foreign('manteinance_action_id')->nullable()->references('id')->on('manteinance_actions')->onDelete('cascade');
            $table->string('number')->nullable();
            $table->string('status')->nullable();
            $table->string('manteinance_action_confirmation_date')->nullable();
            $table->string('customer_confitmation_date')->nullable();
            $table->timestamps();
        });

        Schema::create('cleannings', function (Blueprint $table) {
            $table->id();
            $table->integer('property_id')->nullable()->unsigned();
            $table->foreign('property_id')->nullable()->references('id')->on('properties')->onDelete('cascade');
            $table->integer('customer_id')->nullable()->unsigned();
            $table->foreign('customer_id')->nullable()->references('id')->on('customers')->onDelete('cascade');
            $table->string('mrh_cost')->nullable();
            $table->string('customer_price')->nullable();
            $table->string('type')->nullable();
            $table->longText('comment');
            $table->string('date')->nullable();
            $table->string('hour')->nullable();
            $table->string('month')->nullable();
            $table->longText('summary_comment');
            $table->timestamps();
        });



        Schema::create('cleanning_assignations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('cleanning_id')->nullable()->unsigned();
            $table->foreign('cleanning_id')->nullable()->references('id')->on('cleannings')->onDelete('cascade');
            $table->string('number')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('cleanning_assignations');
        Schema::dropIfExists('cleannings');
        Schema::dropIfExists('manteinance_action_assignations');
        Schema::dropIfExists('manteinance_actions');
        Schema::dropIfExists('checkout_assignations');
        Schema::dropIfExists('checkin_assignations');

    }
}
