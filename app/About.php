<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table='about';
    public $timestamps=false;
    protected $fillable=['name_en','name_ru','name_am','description_en','description_ru','description_am'];
}
