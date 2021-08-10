<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill', function (Blueprint $table) {
            // $table->id(); // biginteger & unsigned
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('area_id');
            $table->unsignedInteger('pitch_id');
            $table->date('day');
            $table->time('time_start');
            $table->time('time_end');
            $table->string('active');
            $table->float('deposit');
            $table->float('missing');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customer');
            $table->foreign('area_id')->references('id')->on('area');
            $table->foreign('pitch_id')->references('id')->on('pitch');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bill');
    }
}
