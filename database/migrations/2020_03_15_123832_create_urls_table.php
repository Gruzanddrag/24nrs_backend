<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->string('description');
        });

        DB::table('urls')->insert([
            [
                'url' => '/',
                'description' => 'Главная страница'
            ],
            [
                'url' => '/landing',
                'description' => 'Страница лэндинга'
            ],
            [
                'url' => '/contacts',
                'description' => 'Страница с контактами организации'
            ],
            [
                'url' => '/services',
                'description' => 'Страница с услугами'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urls');
    }
}
