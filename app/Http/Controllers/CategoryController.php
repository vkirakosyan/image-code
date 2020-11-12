<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Services;
class CategoryController extends Controller
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
            $cotegory=new Category();
            $cotegory->name_en=$request->input('name_en');
            $cotegory->name_ru=$request->input('name_ru');
            $cotegory->name_am=$request->input('name_am');
            $cotegory->save();
            return redirect('/servises');
        
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
            $cotegory=Category::find($id);
            return view('category.edit',['category'=>$cotegory]);
         
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
            $cotegory=Category::find($id);
            $cotegory->name_en=$request->input('name_en');
            $cotegory->name_ru=$request->input('name_ru');
            $cotegory->name_am=$request->input('name_am');
            $cotegory->save();
            return redirect('/servises');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images=Services::where('category_id',$id)->get();
        foreach ($images as $img) {
            unlink(public_path('/img/uploads/'.$img->img));
        }
        Category::find($id)->delete();
         
    }
}
