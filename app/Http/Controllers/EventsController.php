<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Events;

class EventsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events=Events::where('previous','hide')->orderBy('id', 'DESC')->get([
            'name_'.app()->getLocale().' as name',
            'description_'.app()->getLocale().' as description',
            'url',
            'img',
            'previous',
            'id'
        ]);
        $previousdata=Events::where('previous','show')->orderBy('id', 'DESC')->get([
            'name_'.app()->getLocale().' as name',
            'description_'.app()->getLocale().' as description',
            'url',
            'previous',
            'img',
            'id'
        ]);
        return view('events.dashbord',[
            'events'=>$events,
            'previousdata'=>$previousdata
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event=new Events();
        $event->name_en=$request->input('name_en');
        $event->name_ru=$request->input('name_ru');
        $event->name_am=$request->input('name_am');
        $event->description_en=$request->input('description_en');
        $event->description_ru=$request->input('description_ru');
        $event->description_am=$request->input('description_am');
        if($request->file('image')){
            $photo= $request->file('image');
            $image_url=uniqid().$photo->getClientOriginalName();
            $photo->move(public_path('img/uploads'),$image_url);
            $event->img=$image_url;
            $event->url="no";
            $event->previous="show";
            $event->save();
            return redirect('events');
        }
        else
        {
            if($request->input('url'))
            {
                $event->img="no";
                $event->url=$request->input('url');
                $event->previous="hide";
                $event->save();
                return redirect('events');
            }
        }
        return redirect('events');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('events.edit',['event'=>Events::find($id)]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event=Events::find($id);
        $event->name_en=$request->input('name_en');
        $event->name_ru=$request->input('name_ru');
        $event->name_am=$request->input('name_am');
        $event->description_en=$request->input('description_en');
        $event->description_ru=$request->input('description_ru');
        $event->description_am=$request->input('description_am');
        if($request->input('url')){
            $event->url=$request->input('url');
            $event->previous='hide';
            if($event->img!='no'){
                unlink(public_path('/img/uploads/'.$event->img));
                $event->img='no';
            }

        }
        else
        {
            if($request->file('image')){
                if($event->img!='no'){
                    unlink(public_path("/img/uploads/".$event->img));
                }
                $photo= $request->file('image');
                $event->previous='show';
                $image_url=uniqid().$photo->getClientOriginalName();
                $photo->move(public_path('img/uploads'),$image_url);
                $event->img=$image_url;
                $event->url='no';
            }
        }
        $event->save();
        return redirect('/events');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $events=Events::find($id);
        if($events->img=='no'){
            $events->delete();
            return "true";
        }
        else
        {
            if(unlink(public_path("/img/uploads/".$events->img))){
                $events->delete();
                return "true";
            }
        }
        return "false";
    
    }
}
