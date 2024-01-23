<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->timestamps();
        });

        Schema::create('checklist_items', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->unsignedBigInteger('checklist_category_id')->nullable()->unsigned();
            $table->foreign('checklist_category_id')->nullable()->references('id')->on('checklist_categories')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('checklist_item_property', function (Blueprint $table) {
            $table->id();
            $table->integer('property_id')->nullable()->unsigned();
            $table->foreign('property_id')->nullable()->references('id')->on('properties')->onDelete('cascade');
            $table->unsignedBigInteger('checklist_item_id')->nullable()->unsigned();
            $table->foreign('checklist_item_id')->nullable()->references('id')->on('checklist_items')->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('property_items', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('quantity')->nullable();
            $table->string('date')->nullable();
            $table->longText('notes');
            $table->longText('description');
            $table->string('price')->nullable();
            $table->string('position')->nullable();
            $table->string('status')->nullable();
            $table->string('attachment')->nullable();
            $table->string('category')->nullable();
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
        Schema::dropIfExists('checklist_item_property');
        Schema::dropIfExists('checklist_items');
        Schema::dropIfExists('checklist_categories');
        Schema::dropIfExists('property_items');

    }
}
