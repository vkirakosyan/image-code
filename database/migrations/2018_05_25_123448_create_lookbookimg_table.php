<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLookbookimgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lookbookimg', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('name_am');
            $table->longText('description_en');
            $table->longText('description_ru');
            $table->longText('description_am');
            $table->string('img');
            $table->unsignedInteger('lookbook_id');
            $table->foreign('lookbook_id')->references('id')->on('lookbook')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lookbookimg');
    }
}
