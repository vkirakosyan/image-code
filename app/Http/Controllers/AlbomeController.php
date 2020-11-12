<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Albome;
use App\Photosesia;
class AlbomeController extends Controller
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
            if($request->file('image')){
                $photo= $request->file('image');
                $image_url=uniqid().$photo->getClientOriginalName();
                $photo->move(public_path('img/uploads'),$image_url);
                $albome=new Albome();
                $albome->name_en=$request->input('name_en');
                $albome->name_ru=$request->input('name_ru');
                $albome->name_am=$request->input('name_am');
                $albome->img=$image_url;
                $albome->save();
                return redirect('/photosesia');
            }
            else
            {
                return redirect('/photosesia');
            }
        
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
        return view('photosesia.EditAlbom',['albom'=>Albome::find($id)]);
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
            $albome=Albome::find($id);
            if($request->file('image')){
                $image_url="";
                if(unlink(public_path('img/uploads'.$albome->img))){
                    $photo= $request->file('image');
                    $image_url=uniqid().$photo->getClientOriginalName();
                    $photo->move(public_path('img/uploads'),$image_url);
                    $albome->img=$image_url;
                }
            }
            $albome->name_en=$request->input('name_en');
            $albome->name_ru=$request->input('name_ru');
            $albome->name_am=$request->input('name_am');
            $albome->save();
            return redirect('/photosesia');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $albome=Albome::find($id);
        $controll=true;
        foreach ($albome->photosesia as  $photo) {
            if(unlink(public_path('img/uploads/'.$photo->img))){
               $photo->delete();
                continue;
            }
            else
            {
               $controll=false; 
               break;
            }
        }
        if($controll){
            if(unlink(public_path('img/uploads/'.$albome->img))){
                $albome->delete();
            }
        }

    }
}
