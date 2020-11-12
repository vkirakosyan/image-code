<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrainingCotegory;
use App\Training;
class TrainingCategoryController extends Controller
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
        $Training_C=new TrainingCotegory();
        $Training_C->name_en=$request->input('name_en');
        $Training_C->name_ru=$request->input('name_ru');
        $Training_C->name_am=$request->input('name_am');
        $Training_C->save();
        return redirect('/training');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $TreaningCotegory=TrainingCotegory::find($id);
        $TreaningCotegory->training;
        return view('treaningcotegory.show',['treaningcotegory'=>$TreaningCotegory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $TreaningCotegory=TrainingCotegory::find($id)->first();
         return view('treaningcotegory.edit',['treaningcotegory'=>$TreaningCotegory]);
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
        $Training_C= TrainingCotegory::find($id);
        $Training_C->name_en=$request->input('name_en');
        $Training_C->name_ru=$request->input('name_ru');
        $Training_C->name_am=$request->input('name_am');
        $Training_C->save();
        return redirect('/training');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images=Training::where('category_id',$id)->get();
        foreach ($images as $img) {
            unlink(public_path('/img/uploads/'.$img->img));
        }
        TreaningCotegory::find($id)->delete();
    }
}
