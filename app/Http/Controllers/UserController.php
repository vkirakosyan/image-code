<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DashbordText;
use App\Category;
use App\Photosesia;
use App\Team;
use App\TeamCotegory;
use App\Contact;
use App\Lookbook;
use App\Lookbookimg;
use App\Programs;
use App\Events;
use App\Training;
use App\TrainingCotegory;
use App\Albome;
use App\About;
use Lang;
use App\Slide;


class UserController extends Controller
{
    private function returnAllServise() {
        $servise = Category::Select([
            'name_'.app()->getLocale().' as name',
            'id'
        ])->get();
        foreach($servise as $service){
            $service->servises;
        }
        return $servise;
    }
    public function returncontact()
    {
        return $contact=Contact::OrderBy('id', 'DESC')->get([
            'address_'.app()->getLocale().' as address',
            'email',
            'facebook',
            'instagram',
            'maps',
            'phony',
            'phony_city',
            'telegram',
            'twiter',
            'viber',
            'whatsapp',
            'vk',
            'id'
        ])->first();
    }
    
	public function returnNavbar($lang='en')
    {
        if(session('lang')!=''){
            app()->setLocale(session('lang'));
        }
        $navbar = Lang::get('navbar');
        $footer = Lang::get('footer');
        $teams = TeamCotegory::OrderBy('id', 'DESC')->get([
            'name_'.app()->getLocale().' as name',
            'id'
        ]);
        $teams[]='teams';
		$lookbook=Lookbook::OrderBy('id', 'DESC')->get([
            'name_'.app()->getLocale().' as name',
            'id'
        ]);
		$lookbook[]="user_lookbook";
		$category=Category::OrderBy('id', 'DESC')->get([
            'name_'.app()->getLocale().' as name',
            'id'
        ]);

		$category[]="service";
		$proects=[['name'=>$navbar['photosesio'],'id'=>"1"],['name'=>$navbar['programs'],'id'=>"2"],['name'=>$navbar['events'],'id'=>"3"]];
		$proects[]='proects';
        $training=TrainingCotegory::OrderBy('id', 'DESC')->get([
            'name_'.app()->getLocale().' as name',
            'id'
        ]);
        $training[]='user_training';

		return [[$navbar['home']=>'/',
                $navbar['about']=>'/user_about',
                $navbar['team']=>$teams,
                $navbar['lookbook']=>$lookbook,
                $navbar['service']=> '/service', //$category,
                $navbar['projects']=>$proects,
                $navbar['training']=>$training,
                $navbar['contact']=>'/user_contact'
            ]];
    }
    public function index()
    {
    	$navbar=$this->returnNavbar();
        $contact=$this->returncontact();
        $slide= Slide::All();
        $trainingsCount = \DB::table('training_cotegory')->count();
        $text=DashbordText::OrderBy('id', 'DESC')->get([
            'description_'.app()->getLocale().' as description',
            'elos_'.app()->getLocale().' as elos',
            'training_'.app()->getLocale().' as training',
            'footer_'.app()->getLocale().' as footer',
            'id'
        ]);
    	return view('user.dashbord',['navbar'=>$navbar,'contact'=>$contact,'text'=>$text, 'slide'=> $slide, 'trainingsCount' => $trainingsCount]);
    }
    public function teams($id=''){ 
    	$navbar=$this->returnNavbar();
        if ( $id!='' ){
            $teams=TeamCotegory::Where('id',$id)->get([
            'name_'.app()->getLocale().' as name',
            'id'
        ])->first();
            $teams->team;
        } else {
            $teams=TeamCotegory::OrderBy('id', 'DESC')->get([
            'name_'.app()->getLocale().' as name',
            'id'
        ]);
            foreach ($teams as  $team) {
                $team->team;
            }
        }
        $contact=$this->returncontact();
    	return view('user.teams',['teams'=>$teams,'navbar'=>$navbar,'contact'=>$contact,]);
    }
    public function servis($id)
    {
    	$navbar=$this->returnNavbar();
    	$category=Category::Where('id',$id)->get([
            'name_'.app()->getLocale().' as name',
            'id'
        ]);
        $category->first()->servises;
        $contact=$this->returncontact();
    	return view('user.servises',['category'=>$category->first(),'navbar'=>$navbar,'contact'=>$contact,]);
    }
    public function lookbook($id){
        $navbar=$this->returnNavbar();
        $lookbookimg=Lookbook::find($id);

        if(isset($lookbookimg->lookbookCategory)){
            $lookbookimg->lookbookCategory;
        }
        foreach($lookbookimg->lookbookCategory as $lookbookCategory) {
            $lookbookCategory['photosesia'] =  Lookbookimg::Where('lookbook_category_id', $lookbookCategory->id )->get();
        }
        $contact=$this->returncontact();

    	return view('user.userlookbook',['lookbookimg'=>$lookbookimg,'navbar'=>$navbar,'contact'=>$contact,]);
    }
     public function proects($id)
     {
    	$navbar=$this->returnNavbar();
    	if($id==1){
    		$images=Albome::OrderBy('id', 'DESC')->get([
            'name_'.app()->getLocale().' as name',
            'img',
            'id'
        ]);
            foreach ($images as  $value) {
                $value->photosesia;
            }
            $contact=$this->returncontact();
    		return view('user.photosesia',['images'=>$images,'navbar'=>$navbar,'contact'=>$contact,]);
    	}else if($id==2){
    		$programs=Programs::OrderBy('id', 'DESC')->get([
                'name_'.app()->getLocale().' as name',
                'description_'.app()->getLocale().' as description',
                'url',
                'id'
            ]);
            $contact=$this->returncontact();
    		return view('user.programs',['programs'=>$programs,'navbar'=>$navbar,'contact'=>$contact,]);
    	}else if($id==3){
            $events['complated']=Events::where('img','no')->orderBy('id', 'DESC')->get([
                'name_'.app()->getLocale().' as name',
                'description_'.app()->getLocale().' as description',
                'url',
                'img',
                'previous',
                'id'
            ]);
            $events['before']=Events::where('url','no')->orderBy('id', 'DESC')->get([
                'name_'.app()->getLocale().' as name',
                'description_'.app()->getLocale().' as description',
                'url',
                'img',
                'previous',
                'id'
            ]);
            $contact=$this->returncontact();
    		return view('user.events',['events'=>$events,'navbar'=>$navbar,'contact'=>$contact,]);
    	} else {
    		return 	redirect('/');
            }
    }
    	
    
    public function UserTraining($id='')
    {
        $navbar   = $this->returnNavbar();
        $training = $id != '' ? TrainingCotegory::find($id) : TrainingCotegory::All();
        $contact  = $this->returncontact();

        if (is_null($training)) {
            $training = new TrainingCotegory();
        }

    	return view('user.training',compact('training', 'navbar', 'contact'));
    }
    public function UserContact()
    {
    	$navbar=$this->returnNavbar();
        $contact=$this->returncontact();
    	return view('user.contact',['contact'=>$contact,'navbar'=>$navbar]);
    }
     public function UserAbout()
     {
    	$navbar=$this->returnNavbar();
    	$about=About::OrderBy('id', 'DESC')->get([
            'name_'.app()->getLocale().' as name',
            'description_'.app()->getLocale().' as description',
            'id'
        ]);
        $contact=$this->returncontact();
    	return view('user.about',['about'=>$about,'navbar'=>$navbar,'contact'=>$contact,]);
    }
    public function UserPortfolio($id)
    {
    	$navbar=$this->returnNavbar();
    	$team=Team::Where('id',$id)->get([
            'name_'.app()->getLocale().' as name',
            'profession_'.app()->getLocale().' as profession',
            'characteristics_'.app()->getLocale().' as characteristics',
            'id',
            'img'
        ])->first();
    	$team->portfolio;
    	$contact=$this->returncontact();
    	return view('user.portfolio',['team'=>$team,'navbar'=>$navbar,'contact'=>$contact,]);
    }
    public function UserService () {
        $navbar=$this->returnNavbar();
        $servise=$this->returnAllServise();
        $contact=$this->returncontact();
        return view('user.servise',['servise'=>$servise,'navbar'=>$navbar,'contact'=>$contact]);
        
    }
}
