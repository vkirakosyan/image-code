<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('name_am');
            $table->longText('description_en');
            $table->longText('description_ru');
            $table->longText('description_am');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
