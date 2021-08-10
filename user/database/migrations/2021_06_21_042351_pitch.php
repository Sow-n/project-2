<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pitch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pitch', function (Blueprint $table) {
            // $table->id(); // biginteger & unsigned
            $table->increments('id');
            $table->unsignedInteger('area_id');
            $table->unsignedInteger('pitch_type_id');
            $table->string('pitch_name');
            $table->string('image_path');
            $table->float('price');
            $table->boolean('del_flag');
            $table->timestamps();

            $table->foreign('area_id')->references('id')->on('area');
            $table->foreign('pitch_type_id')->references('id')->on('pitch_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pitch');
    }
}
