<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LookBookCategory extends Model
{
    protected $table='lookbook_category';
    public $timestamps=false;
    protected $fillable=['name_en','name_ru','name_am', 'image', ''];

    
}
