<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
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
            $table->integer('role_id')->nullable()->unsigned();
            $table->foreign('role_id')->nullable()->references('id')->on('roles')->onDelete('cascade');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            Schema::dropIfExists('users');
            Schema::dropIfExists('roles');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
