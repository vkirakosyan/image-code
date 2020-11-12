<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Lookbookimg;
use App\Lookbook;
use App\LookBookCategory;

class LookbookimgController extends Controller
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
        //
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
        $photo= $request->file('image');
        $image_url=uniqid().$photo->getClientOriginalName();
        $photo->move(public_path('img/uploads'),$image_url);
        $lookbookimg=new Lookbookimg();
        $lookbookimg->name_en=$request->input('name_en');
        $lookbookimg->name_ru=$request->input('name_ru');
        $lookbookimg->name_am=$request->input('name_am');
        $lookbookimg->description_en=$request->input('description_en');
        $lookbookimg->description_ru=$request->input('description_ru');
        $lookbookimg->description_am=$request->input('description_am');
        $lookbookimg->lookbook_id=$request->get('lookbook_id');
        $lookbookimg->lookbook_category_id=$request->get('lookbook_category_id');
        $lookbookimg->img=$image_url;
        $lookbookimg->save();
        return redirect('/lookbook');
         
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
        $lookbookimg=Lookbookimg::find($id);
        $lookbookimg->lookbook;
        $lookbookdata=Lookbook::OrderBy('id', 'DESC')->get([
            'name_'.app()->getLocale().' as name',
            'id'
        ]);
        $lookbooks_category = LookBookCategory::OrderBy('id', 'DESC')->get([
            'name_'.app()->getLocale().' as name',
            'id'
        ]);
        return view('lookbookimg.edit',['lookbookimg'=>$lookbookimg,'lookbook'=>$lookbookdata, 'lookbook_category'=>$lookbooks_category]);

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
        $lookbookimg=Lookbookimg::find($id);
        if($request->file('image'))
        {
            $file_name = Lookbookimg::find($id)->img;
            $file_path = public_path('/img/uploads/'.$file_name);
            if(file_exists($file_path) && !is_dir($file_path) && unlink($file_path)){
                $photo= $request->file('image');
                $image_url=uniqid().$photo->getClientOriginalName();
                $photo->move(public_path('img/uploads'),$image_url);
                $lookbookimg->img=$image_url;
            }
        }
        $lookbookimg->name_en=$request->input('name_en');
        $lookbookimg->name_ru=$request->input('name_ru');
        $lookbookimg->name_am=$request->input('name_am');
        $lookbookimg->description_en=$request->input('description_en');
        $lookbookimg->description_ru=$request->input('description_ru');
        $lookbookimg->description_am=$request->input('description_am');
        $lookbookimg->lookbook_id=$request->get('lookbook_id');
        $lookbookimg->save();
        return redirect('/lookbook');

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lookbookimg=Lookbookimg::find($id);
        if(unlink(public_path('/img/uploads/'.$lookbookimg->img))){
            $lookbookimg->delete();
        }
       
    }
}
