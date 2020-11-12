<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Team;
use App\Portfolio;
class PortfolioController extends Controller
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
        if($request->isMethod('post')){
            $team_id=$request->input('team');
             foreach ($request->image as $photo) {
                $image_url=uniqid().$photo->getClientOriginalName();
                $photo->move(public_path('img/uploads'),$image_url);
                $portfolio=new Portfolio();
                $portfolio->img=$image_url;
                $portfolio->team_id=$team_id;
                $portfolio->save();
             }
            return redirect('/portfolio/'.$team_id);
        }
        else
        {
            return redirect('/portfolio/'.$team_id);
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
        $team=Team::find($id);
        $team->portfolio;
        return view('portfolio.show',['portfolio'=>$team]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio=Portfolio::find($id);
        try{
            unlink(public_path('img/uploads/'.$portfolio->img));

        }catch(Exception $e){
            return $e;
        }
        if($portfolio->delete()){
            return "delete";
        }
        else
        {
            return "error";
        }
    }
}
