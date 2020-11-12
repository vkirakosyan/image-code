<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguigeController extends Controller
{
    public function lang($lang,$page='/',$id=0){
         if($lang!='/'){
            app()->setLocale($lang);
            session(['lang' => $lang]);
        }
        else
        {
           session(['lang' => 'en']); 
        }
        if($id==0){
            return redirect($page);
        }
        else
        {
            return redirect($page.'/'.$id);
        }
    }
}
