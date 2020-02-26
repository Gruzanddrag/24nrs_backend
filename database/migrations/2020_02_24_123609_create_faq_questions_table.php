<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('questionAnswer');
            $table->string('question');
            $table->timestamps();
        });
        Schema::table('faq_questions', function(Blueprint $table){
            $table->integer('category_id')->nullable()->unsigned()->default(1);
            $table->foreign('category_id')->references('id')->on('faq_question_categories')->onDelete('no actions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faq_questions');
    }
}
