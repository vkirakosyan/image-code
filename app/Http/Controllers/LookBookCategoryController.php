<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LookBookCategory;
use App\Lookbook;
use App\Lookbookimg;
class LookBookCategoryController extends Controller
{
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo = $request->file('image');
        $image_url=uniqid().$photo->getClientOriginalName();
        $photo->move(public_path('img/uploads'),$image_url);
        $lookbook=new LookBookCategory();
        $lookbook->name_en=$request->input('name_en');
        $lookbook->name_ru=$request->input('name_ru');
        $lookbook->name_am=$request->input('name_am');
        $lookbook->lookbook_id=$request->input('lookbook_id');
        $lookbook->image=$image_url;
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
        $lookbook = Lookbook::find($id);
        $lookbook->lookbookCategory;
        foreach($lookbook->lookbookCategory as $category){
            $category['photosesia'] = Lookbookimg::Where('lookbook_category_id', $category->id )->get();
        }
        return view('lookbook.lookbook_category',['lookbook'=>$lookbook]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // $images=LookbookCategoryController::where('lookbook_category_id',$id)->get();
        // foreach ($images as $img) {
        //     unlink(public_path('/img/uploads/'.$img->img));
        // }
        // LookbookCategoryController::find($id)->delete();
    }
}
