<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lookbookimg extends Model
{
    protected $table='lookbookimg';
    public $timestamps=false;

    public function lookbook()
    {
        return $this->belongsTo('App\Lookbook')->orderBy('id','DESC')->select([
        	'name_'.app()->getLocale().' as name',
            'id'
        ]);
    }
}
