<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Training;
use App\TrainingCotegory;
class TrainingController extends Controller
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
        $training=Training::OrderBy('id', 'DESC')->get([
            'name_'.app()->getLocale().' as name',
            'description_'.app()->getLocale().' as description',
            'category_id',
            'id'
        ]);
        $cotegorytraining=TrainingCotegory::OrderBy('id', 'DESC')->get([
            'name_'.app()->getLocale().' as name',
            'id'
        ]);
        return view('training.dashbord',['training'=>$training,'cotegorytraining'=>$cotegorytraining]);
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
        try {
                $file=$request->file('image');
                $image_url=time().$file->getClientOriginalName();
                $file->move(public_path('img/uploads'),$image_url);
                $training= new Training();
                $training->name_en=$request->name_en;
                $training->name_ru=$request->name_ru;
                $training->name_am=$request->name_am;
                $training->specificity_en=$request->specificity_en;
                $training->specificity_ru=$request->specificity_ru;
                $training->specificity_am=$request->specificity_am;
                $training->description_en=$request->description_en;
                $training->description_ru=$request->description_ru;
                $training->description_am=$request->description_am;
                $training->category_id=$request->get('cotegory');
                $training->img=$image_url;
                $training->save();
            } catch (Exception $e) {
                return $e;
            }    
            return redirect('training');
       
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
        $training=Training::find($id);
        return view('training.edit',['training'=>$training]);
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
        try {
             $training=Training::find($id);
            if($request->file('image')){
                unlink(public_path('img/uploads/'.$training->img));
                $file=$request->file('image');
                $image_url=time().$file->getClientOriginalName();
                $file->move(public_path('img/uploads'),$image_url);
                $training->img=$image_url;
            }
            $training->name_en=$request->input('name_en');
            $training->name_ru=$request->input('name_ru');
            $training->name_am=$request->input('name_am');
            $training->specificity_en=$request->input('specificity_en');
            $training->specificity_ru=$request->input('specificity_ru');
            $training->specificity_am=$request->input('specificity_am');
            $training->description_en=$request->input('description_en');
            $training->description_ru=$request->input('description_ru');
            $training->description_am=$request->input('description_am');
            $training->save();
            return redirect('/training');
        } catch (Exception $e) {
            return $e;
        }
              
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    
        $training=Training::find($id);
        try {
            unlink(public_path('img/uploads/'.$training->img));
            $training->delete();
            return "delete";
        } catch (Exception $e) {
            return $e;
        }
    }
}
