<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albome extends Model
{
    protected $table='albome';
    public $timestamps=false;

     public function photosesia(){
    	return $this->hasMany('App\Photosesia','albome_id')->orderBy('id','DESC')
    	->select([
        	'name_'.app()->getLocale().' as name',
        	'description_'.app()->getLocale().' as description',
            'id',
            'img'
        ]);
    }
}
