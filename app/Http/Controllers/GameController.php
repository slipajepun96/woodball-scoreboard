<?php

namespace App\Http\Controllers;
use App\Models\Game;
use App\Models\GamePlayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function index()
    {
        $games_lists=Game::all();
        return view('admin.games&scores.index',['games_lists'=>$games_lists]);
    }

    public function add()
    {
        return view('admin.games&scores.add');
    }

    public function view($id)
    {
        $games_detail=Game::findOrFail($id);
        $gameplayers_list=GamePlayer::all()->where('game_id',$id);
        return view('admin.games&scores.view',['games_detail'=>$games_detail,'gameplayers_list'=>$gameplayers_list]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'games_date'=>'required',
            'games_name'=>'required'
        ]);


        $game=new Game();
        $game->games_date=$request->games_date;
        $game->games_name=$request->games_name;
        if($request->is_group==TRUE)
            $game->is_group=1;
        else
            $game->is_group=0;
        if($request->separate_by_sex==TRUE)
            $game->separate_by_sex=1;
        else
            $game->separate_by_sex=0;
        
        $game->save();
        Session::flash('status','New game successfully added');
        return redirect('/admin/games/');
    }

    public function edit($id)
    {
        $games_detail=Game::findOrFail($id);
        return view('admin.games&scores.edit',['games_detail'=>$games_detail]);
    }

    public function update(Request $request,$id)
    {
        // dd($request);
        $this->validate($request,[
            'games_date'=>'required',
            'games_name'=>'required'
        ]);


        $game=Game::findOrFail($id);
        $game->games_date=$request->games_date;
        $game->games_name=$request->games_name;
        if($request->is_group==TRUE)
            $game->is_group=1;
        else
            $game->is_group=0;
        if($request->separate_by_sex==TRUE)
            $game->separate_by_sex=1;
        else
            $game->separate_by_sex=0;
        
        $game->save();
        Session::flash('status','Game details successfully updated');
        return redirect('/admin/games/');
    }


    public function delete($id)
    {
        DB::table('games')->where('id',$id)->delete();
        Session::flash('delete','Game deleted');
        return redirect('/admin/games/');
    }
}
