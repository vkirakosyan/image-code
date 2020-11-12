<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashpordTextTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashpord_text', function (Blueprint $table) {
            $table->increments('id');
            $table->longtext('description_en');
            $table->longtext('description_ru');
            $table->longtext('description_am');
            $table->longtext('elos_en');
            $table->longtext('elos_ru');
            $table->longtext('elos_am');
            $table->longtext('training_en');
            $table->longtext('training_ru');
            $table->longtext('training_am');
            $table->longtext('footer_en');
            $table->longtext('footer_ru');
            $table->longtext('footer_am');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dashpord_text');
    }
}
