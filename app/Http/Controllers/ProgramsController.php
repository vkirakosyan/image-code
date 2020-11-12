<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Programs;

class ProgramsController extends Controller
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
        $programs=Programs::OrderBy('id', 'DESC')->get([
            'name_'.app()->getLocale().' as name',
            'description_'.app()->getLocale().' as description',
            'url',
            'id'
        ]);
        return view('programs.dashbord',['videos'=> $programs]);
       
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
        $program=new Programs();
        $program->name_en=$request->input('name_en');
        $program->name_ru=$request->input('name_ru');
        $program->name_am=$request->input('name_am');
        $program->description_en=$request->input('description_en');
        $program->description_ru=$request->input('description_ru');
        $program->description_am=$request->input('description_am');
        $program->url=$request->input('url');
        $program->save();
        return redirect('/programs');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('programs.edit',['video'=>Programs::find($id)]);
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
        $video=Programs::find($id);
        if($request->input('url')){
            $video->url=$request->input('url');
        }
        $video->name_en=$request->input('name_en');
        $video->name_ru=$request->input('name_ru');
        $video->name_am=$request->input('name_am');
        $video->description_en=$request->input('description_en');
        $video->description_ru=$request->input('description_ru');
        $video->description_am=$request->input('description_am');
        $video->save();
        return redirect('/programs');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Programs::find($id)->delete();
    }
}
