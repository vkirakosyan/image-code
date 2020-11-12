<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('name_am');
            $table->string('specificity_en');
            $table->string('specificity_ru');
            $table->string('specificity_am');
            $table->longText('description_en');
            $table->longText('description_ru');
            $table->longText('description_am');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('training_cotegory')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training');
    }
}
