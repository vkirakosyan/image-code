<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Team;
use App\TeamCotegory;
use App\Portfolio;
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {       
        $teamscotegorydata=TeamCotegory::OrderBy('id', 'DESC')->get([
            'name_'.app()->getLocale().' as name',
            'id'
        ]);

        $teamscotegory=TeamCotegory::OrderBy('id', 'DESC')->get([
            'name_'.app()->getLocale().' as name',
            'id'
        ]);
        return view('team.dashbord',['teamscotegory'=>$teamscotegory,'teamscotegorydata'=>$teamscotegorydata]);
        
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
            if ($request->file('image')->isValid()) {
                // $validatedData = $this->validate($request,[
                //     'name' => 'required|max:255',
                //     'profession' => 'required|max:255',
                //     'characteristics' =>  'required'
                // ]);
                $file=$request->file('image');
                $image_url=time().$file->getClientOriginalName();
                $file->move(public_path('img/uploads'),$image_url);
                $team= new Team();
                $team->img=$image_url;
                $team->name_en=addslashes($request->input('name_en'));
                $team->name_ru=addslashes($request->input('name_ru'));
                $team->name_am=addslashes($request->input('name_am'));
                $team->profession_en=addslashes($request->input('profession_en'));
                $team->profession_ru=addslashes($request->input('profession_ru'));
                $team->profession_am=addslashes($request->input('profession_am'));
                $team->characteristics_en=addslashes($request->input('characteristics_en'));
                $team->characteristics_ru=addslashes($request->input('characteristics_ru'));
                $team->characteristics_am=addslashes($request->input('characteristics_am'));
                $team->teamcotegoey_id=addslashes($request->get('cotegory'));
                $team->save();
                
            }
            else
            {
                return "invalid file";
            }
        }
        else
        {
            return redirect('/team');
        }
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
        $teams=Team::find($id);
        $teams->portfolio;
        return view('team.show',['teams'=>$teams]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team=Team::find($id);
        return view('team.edit',['team'=>$team]);
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
        $team=Team::find($id);
        $team->name_en=$request->input('name_en');
        $team->name_ru=$request->input('name_ru');
        $team->name_am=$request->input('name_am');
        $team->profession_en=$request->input('profession_en');
        $team->profession_ru=$request->input('profession_ru');
        $team->profession_am=$request->input('profession_am');
        $team->characteristics_en=$request->input('characteristics_en');
        $team->characteristics_ru=$request->input('characteristics_ru');
        $team->characteristics_am=$request->input('characteristics_am');
        if($request->file('image')){
            try {
                $file=$request->file('image');
                unlink(public_path('img/uploads/'.$team->img) );
                $image_url=time().$file->getClientOriginalName();
                $file->move(public_path('img/uploads'),$image_url);
                $team->img=$image_url;

            } catch (Exception $e) {
                return "no save";
            }
        }
        $team->save();
        return redirect('team/'.$id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio_team =Portfolio::where('team_id',$id)->get();
        $team=Team::find($id);
        foreach ($portfolio_team as $portfolio) {
            try {
                unlink(public_path('img/uploads/'.$portfolio->img));
            } catch (Exception $e) {
              return $e;
            }
        }
        if( unlink(public_path('img/uploads/'.$team->img))){
            if(Team::find($id)->delete())
                {
                    return "ok";
                }
                else{
                    return "not delete in databaze";
                }
            }
    }
}
