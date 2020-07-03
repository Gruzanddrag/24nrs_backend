<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageEntryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_entry', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entry_id')->unsigned()->nullable();
            $table->foreign('entry_id')->references('id')->on('entries')->onDelete('cascade');
            $table->integer('page_id')->unsigned()->nullable();
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
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
        Schema::dropIfExists('page_entry');
    }
}
