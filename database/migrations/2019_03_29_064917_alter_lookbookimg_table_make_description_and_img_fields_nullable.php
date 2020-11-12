<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterLookbookimgTableMakeDescriptionAndImgFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lookbookimg', function (Blueprint $table) {
            $table->longText('description_en')->nullable(true)->change();
            $table->longText('description_ru')->nullable(true)->change();
            $table->longText('description_am')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lookbookimg', function (Blueprint $table) {
            $table->longText('description_en')->nullable(false)->change();
            $table->longText('description_ru')->nullable(false)->change();
            $table->longText('description_am')->nullable(false)->change();
        });
    }
}
