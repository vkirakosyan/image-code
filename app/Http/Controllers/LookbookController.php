<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Lookbook;
use App\Lookbookimg;
use App\LookBookCategory;
class LookbookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        if(session('lang')!=''){
            app()->setLocale(session('lang'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lookbooks=Lookbook::OrderBy('id', 'DESC')->get([
            'name_'.app()->getLocale().' as name',
            'id'
        ]);
        $lookbooks_category = LookBookCategory::OrderBy('id', 'DESC')->get([
            'name_'.app()->getLocale().' as name',
            'id'
        ]);
        return view('lookbook.dashbord',['lookbook'=>$lookbooks, 'lookbook_category'=>$lookbooks_category]);
       
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
        $lookbook=new Lookbook();
        $lookbook->name_en=$request->input('name_en');
        $lookbook->name_ru=$request->input('name_ru');
        $lookbook->name_am=$request->input('name_am');
        $lookbook->save();
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
        $lookbook=Lookbook::find($id);
        return view('lookbook.edit',['lookbook'=>$lookbook]);
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
        $about=Lookbook::find($id);
        $data=$request->all();
        $about->update($data);
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
        $images=Lookbookimg::where('lookbook_id',$id)->get();
        foreach ($images as $img) {
            unlink(public_path('/img/uploads/'.$img->img));
            $img->delete();
        }
        Lookbook::find($id)->delete();
        LookBookCategory::where('lookbook_id', $id)->delete();
    }
}
