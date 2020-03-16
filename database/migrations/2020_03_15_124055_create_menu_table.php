<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->string('customUrl')->nullable();
            $table->integer('position');
        });
        Schema::table('menu_links', function (Blueprint $table){
            $table->integer('url_id')->unsigned()->nullable();
            $table->foreign('url_id')
                ->references('id')
                ->on('urls')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_links');
    }
}
