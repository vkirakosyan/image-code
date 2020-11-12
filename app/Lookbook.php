<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lookbook extends Model
{
    protected $table='lookbook';
    public $timestamps=false;
    protected $fillable=['name_en','name_ru','name_am'];

    public function lookbookCategory(){
        return $this->hasMany('App\LookBookCategory', 'lookbook_id')->orderBy('id','DESC')
            ->select([
            'name_'.app()->getLocale().' as name',
            'id',
            'image'
        ]);


    }
    
}
