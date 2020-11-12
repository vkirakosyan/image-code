<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('contact', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address_en');
            $table->string('address_ru');
            $table->string('address_am');
            $table->string('phony');
            $table->string('phony_city');
            $table->string('email');
            $table->longText('maps');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('telegram');
            $table->string('twiter');
            $table->string('vk');
            $table->string('viber');
            $table->string('whatsapp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact');
    }
}
