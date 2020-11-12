<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Photosesia;
use App\Albome;
class PhotosesiaController extends Controller
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
    	$photos=Albome::OrderBy('id', 'DESC')->get([
            'name_'.app()->getLocale().' as name',
            'img',
            'id'
        ]);

        foreach ($photos as $albom) {
          $albom->photosesia;
        }
        //return $photos;
        return view("photosesia.dashbord",['photos'=>$photos]);
      
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
    		$photo=$request->file('image');
    		$image_url=uniqid().$photo->getClientOriginalName();
            $photo->move(public_path('img/uploads'),$image_url);
            $photo=new Photosesia();
            $photo->name_en=$request->name_en;
            $photo->name_ru=$request->name_ru;
     		$photo->name_am=$request->name_am;
            $photo->description_en=$request->description_en;
            $photo->description_ru=$request->description_ru;
     		$photo->description_am=$request->description_am;
     		$photo->img=$image_url;
            $photo->albome_id=$request->get('albome');
     		$photo->save();
     		return redirect('photosesia');
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
        return view('photosesia.edit',['photo'=>Photosesia::find($id)]);
       
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
        $photo=Photosesia::find($id);
        $photo->name_en=$request->name_en;
        $photo->name_ru=$request->name_ru;
        $photo->name_am=$request->name_am;
        $photo->description_en=$request->description_en;
        $photo->description_ru=$request->description_ru;
        $photo->description_am=$request->description_am;
        $photo->save();
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
        $photo=Photosesia::find($id);
        try {
        	unlink(public_path('img/uploads/'.$photo->img));
        	Photosesia::find($id)->delete();
        	return "ok";
        } catch (Exception $e) {
        	return $e;
        }
    }
}
