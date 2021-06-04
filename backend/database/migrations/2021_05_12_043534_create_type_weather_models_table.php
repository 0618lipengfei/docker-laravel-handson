<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeWeatherModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types_weather', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();

            $table->id('type_id');
            $table->string('name');
            $table->string('value_unit');
            $table->string('time_interval');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types_weather');
    }
}
