<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table='contact';
    public $timestamps=false;
    protected $fillable=['address_en','address_ru','address_am','phony','phony_city','email','maps','facebook','instagram','telegram','twiter','vk','viber','whatsapp'];
}
