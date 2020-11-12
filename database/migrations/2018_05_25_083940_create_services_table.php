<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('price');
            $table->string('valiut');
            $table->string('img');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('name_am');
            $table->longText('description_en');
            $table->longText('description_ru');
            $table->longText('description_am');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
