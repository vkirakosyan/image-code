<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeamCotegory;
use App\Team;
class TeamCategoryController extends Controller
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
        $team= new TeamCotegory();
        $team->name_en=$request->input('name_en');
        $team->name_ru=$request->input('name_ru');
        $team->name_am=$request->input('name_am');
        $team->save();
        return redirect('/team');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $TeamCotgory=TeamCotegory::find($id);
        $TeamCotgory->team;
        return view('teamcotegory.show',['teamcotgory'=>$TeamCotgory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $TeamCotegory=TeamCotegory::find($id)->first();
         return view('teamcotegory.edit',['teamcotegory'=>$TeamCotegory]);
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
        $Team_C= TeamCotegory::find($id);
        $Team_C->name_en=$request->input('name_en');
        $Team_C->name_ru=$request->input('name_ru');
        $Team_C->name_am=$request->input('name_am');
        $Team_C->save();
        return redirect('/team');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images=Team::where('teamcotegoey_id',$id)->get();
        foreach ($images as $img) {
            unlink(public_path('/img/uploads/'.$img->img));
        }
        TeamCotegory::find($id)->delete();
        echo "delete";
    }
}
