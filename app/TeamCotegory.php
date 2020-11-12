<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamCotegory extends Model
{
	protected $table='team_cotegory';
    public $timestamps=false;

     public function team(){
    	return $this->hasMany('App\Team','teamcotegoey_id')->orderBy('id','DESC')->select([
        	'name_'.app()->getLocale().' as name',
        	'profession_'.app()->getLocale().' as profession',
        	'characteristics_'.app()->getLocale().' as characteristics',
            'id',
            'img'
        ]);
    }
}
