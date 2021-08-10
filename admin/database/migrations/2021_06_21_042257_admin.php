<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            // $table->id(); // biginteger & unsigned
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('password_encode');
            $table->date('date_birth');
            $table->boolean('gender');
            $table->string('phone');
            $table->string('address');
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('area_id');
            $table->boolean('del_flag');

            $table->foreign('area_id')->references('id')->on('area');
            $table->foreign('role_id')->references('id')->on('role');
            $table->timestamps(); // tu dong tao 2 cot là create_at va update_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin');
    }
}
