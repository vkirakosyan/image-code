<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DashbordText;
class DashbordTextController extends Controller
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
        $text=DashbordText::OrderBy('id', 'DESC')->get([
            'description_'.app()->getLocale().' as description',
            'elos_'.app()->getLocale().' as elos',
            'training_'.app()->getLocale().' as training',
            'footer_'.app()->getLocale().' as footer',
            'id'
        ]);
        // return $text;
        return view('dashbordtext.dashbord',['text'=>$text]);
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
        $text=new DashbordText();
        $text->description_en=$request->description_en;
        $text->description_ru=$request->description_ru;
        $text->description_am=$request->description_am;
        $text->elos_en=$request->elos_en;
        $text->elos_ru=$request->elos_ru;
        $text->elos_am=$request->elos_am;
        $text->training_en=$request->training_en;
        $text->training_ru=$request->training_ru;
        $text->training_am=$request->training_am;
        $text->footer_en=$request->footer_en;
        $text->footer_ru=$request->footer_ru;
        $text->footer_am=$request->footer_am;
        $text->save();
        return redirect('/dashbord_text');
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
        $text=DashbordText::Where('id',$id)->get();
        // return $text;
        return view('dashbordtext.edit' , ['text' => $text]);
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
        $text=new DashbordText();
        $text->description_en=$request->description_en;
        $text->description_ru=$request->description_ru;
        $text->description_am=$request->description_am;
        $text->elos_en=$request->elos_en;
        $text->elos_ru=$request->elos_ru;
        $text->elos_am=$request->elos_am;
        $text->training_en=$request->training_en;
        $text->training_ru=$request->training_ru;
        $text->training_am=$request->training_am;
        $text->footer_en=$request->footer_en;
        $text->footer_ru=$request->footer_ru;
        $text->footer_am=$request->footer_am;
        $text->save();
        return redirect('/dashbord_text');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DashbordText::find($id)->delete();
    }
}



