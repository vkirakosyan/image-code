<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category';
    public $timestamps=false;

     public function servises(){
    	return $this->hasMany('App\Services')
            ->select([
                'name_'.app()->getLocale().' as name',
                'price',
                'valiut',
                'id'
            ]);
    }
}
