<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PitchType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pitch_type', function (Blueprint $table) {
            // $table->id(); // biginteger & unsigned
            $table->increments('id');
            $table->string('pitch_type_name');
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
        Schema::drop('pitch_type');
    }
}
