<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table="services";
    public $timestamps=false;

     public function category(){
    	return $this->belongsTo('App\Category')->orderBy('id','DESC')->select([
        	'name_'.app()->getLocale().' as name',
            'id'
        ]);
    }
}
