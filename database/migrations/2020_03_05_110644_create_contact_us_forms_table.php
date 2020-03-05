<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUsFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('FIO');
            $table->string('tel');
            $table->date('date');
            $table->time('time');
            $table->string('ip');
            $table->string('region');
            $table->string('town');
            $table->string('position');
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
        Schema::dropIfExists('contact_us_forms');
    }
}
