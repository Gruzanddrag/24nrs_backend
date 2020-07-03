<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->string('name');
            $table->timestamps();
        });
        $otherPage = new \App\Models\Page();
        $otherPage->url = "";
        $otherPage->name = "Другая";
        $otherPage->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $otherPage = \App\Models\Page::find(1);
        $otherPage->delete();
        Schema::dropIfExists('page');
    }
}
