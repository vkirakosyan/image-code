<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LookbookCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lookbook_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("lookbook_id");
            $table->string("name_en");
            $table->string("name_ru");
            $table->string("name_am");
            $table->string("image");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lookbook_category');
    }
}
