<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img')->nullable();
            $table->string('authorPosition');
            $table->string('authorName');
            $table->string('lead');
            $table->text('content');
            $table->string('href');
            $table->timestamps();
        });
        Schema::table('reviews', function (Blueprint $table) {
            $table->integer('document_id')->unsigned();
            $table->foreign('document_id')->references('id')->on('documents');
        });
    }

/**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
