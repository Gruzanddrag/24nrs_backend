<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageFaqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_faq', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('faq_category_id')->unsigned()->nullable();
            $table->foreign('faq_category_id')->references('id')->on('faq_question_categories')->onDelete('cascade');
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
        Schema::dropIfExists('page_faq');
    }
}
