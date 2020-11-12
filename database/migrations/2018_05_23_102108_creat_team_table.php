<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('name_am');
            $table->string('profession_en');
            $table->string('profession_ru');
            $table->string('profession_am');
            $table->longText('characteristics_en');
            $table->longText('characteristics_ru');
            $table->longText('characteristics_am');
            $table->unsignedInteger('teamcotegoey_id');
            $table->foreign('teamcotegoey_id')->references('id')->on('team_cotegory')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team');
    }
}
