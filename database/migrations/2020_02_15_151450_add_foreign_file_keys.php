<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignFileKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entries', function (Blueprint $t) {
            $t->integer('preview')->unsigned()->nullable();
            $t->foreign('preview')->references('id')->on('files')->onDelete('set null');
            $t->integer('desktop')->unsigned()->nullable();
            $t->foreign('desktop')->references('id')->on('files')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
