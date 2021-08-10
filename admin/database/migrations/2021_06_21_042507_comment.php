<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            // $table->id(); // biginteger & unsigned
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('pitch_id');
            $table->unsignedInteger('area_id'); //string: varchar
            $table->string('content');
            $table->date('time');
            $table->boolean('del_flag');
            $table->timestamps(); // tu dong tao 2 cot là create_at va update_at

            $table->foreign('customer_id')->references('id')->on('customer');
            $table->foreign('pitch_id')->references('id')->on('pitch');
            $table->foreign('area_id')->references('id')->on('area');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comment');
    }
}
