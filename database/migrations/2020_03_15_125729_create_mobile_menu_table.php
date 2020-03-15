<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobileMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_menu_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->integer('position');
            $table->string('customUrl')->nullable();
            $table->integer('parent_id')->unsigned()->nullable();
        });

        Schema::table('mobile_menu_links', function (Blueprint $table){
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
        Schema::dropIfExists('mobile_menu_links');
    }
}
