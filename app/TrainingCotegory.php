<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingCotegory extends Model
{
    protected $table='training_cotegory';
    public $timestamps=false;

    public function training(){
    	return $this->hasMany('App\Training','category_id')->orderBy('id','DESC')->select([
        	'name_'.app()->getLocale().' as name',
        	'specificity_'.app()->getLocale().' as specificity',
        	'description_'.app()->getLocale().' as description',
            'id',
            'img'
        ]);
    }
}
