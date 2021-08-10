<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Area extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area', function (Blueprint $table) {
            // $table->id(); // biginteger & unsigned
            $table->increments('id');
            $table->string('area_name');
            $table->string('area_address');
            $table->string('image_path');
            $table->boolean('del_flag');

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
        Schema::drop('area');
    }
}
