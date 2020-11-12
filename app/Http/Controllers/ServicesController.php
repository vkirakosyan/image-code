<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services;
use App\Category;
class ServicesController extends Controller
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
        $categorys = Category::OrderBy('id', 'DESC')->get([
            'name_'.app()->getLocale().' as name',
            'id'
        ]);

        foreach ($categorys as $category) {
            $category->servises;
        }

        return view('services.dashbord',['category'=>$categorys]);       
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
        $validatedData = $this->validate($request,[
                    'cotegory' => 'required|numeric',
                    'name_en' => 'required|max:255',
                    'price' => 'required',
                ]);
        try {
            $services=new Services();
            $services->category_id=$request->get('cotegory');
            $services->valiut=$request->get('valiut');
            $services->name_en=$request->input('name_en');
            $services->name_ru=$request->input('name_ru');
            $services->name_am=$request->input('name_am');
            $services->price=$request->input('price');
            $services->save();
            return redirect('/servises');
        } catch (Exception $e) {
            return $e;
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
        $servises=Services::find($id);
        $servises->category;
        $categorys=Category::OrderBy('id', 'DESC')->get([
                'name_'.app()->getLocale().' as name',
                'id'
            ]);
        return view('services.edit',['servises'=>$servises,'categorys'=>$categorys]);
        
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
             $services=Services::find($id);
            $services->category_id=$request->get('cotegory');
            $services->valiut=$request->get('valiut');
            $services->name_en=$request->input('name_en');
            $services->name_ru=$request->input('name_ru');
            $services->name_am=$request->input('name_am');
            $services->price=$request->input('price');
            $services->save();
            return redirect('/servises');
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
        $services=Services::where('id', $id)->delete();

        return ['success' => true];
    }
}
