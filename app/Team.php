<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table='team';
    public $timestamps=false;

    public function portfolio(){
    	return $this->hasMany('App\Portfolio')->orderBy('id','DESC');
    }
    

}
