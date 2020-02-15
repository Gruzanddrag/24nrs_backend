<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text')->nullable();
            $table->string('img')->nullable();
            $table->string('href')->nullable();
            $table->timestamps();
        });

        Schema::table('slider_details', function(Blueprint $table) {
            $table->integer('slider_id')->unsigned();
            $table->foreign('slider_id')->references('id')->on('sliders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slider_details');
    }
}
