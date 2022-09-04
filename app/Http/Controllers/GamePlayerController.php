<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Game;
use App\Models\Score;
use App\Models\Player;
use App\Models\GamePlayer;


class GamePlayerController extends Controller
{
    public function index($id)
    {
        $games_detail=Game::findOrFail($id);
        $data_array[0]=Player::all();
        
        $data_array[1]=GamePlayer::all();
        return view('admin.games&scores.add_player',['games_detail'=>$games_detail],['data_array'=>$data_array]);
    }

    // public function fetchPlayer($id)
    // {
    //     $games_detail=Game::findOrFail($id);
    //     $player_lists=Player::all();
    //     return response()->json(
    //         ['games_detail'=>$games_detail,
    //         'player_lists'=>$player_lists,]
    //         );
    // }

    // public function store(Request $request)
    // {
    //     $this->validate($request,[
    //         'game_id'=>'required',
    //         'player_id'=>'required'
    //     ]);
    
    //     $game_player=new GamePlayer;
    //     $game_player->game_id=$request->game_id;
    //     $game_player->player_id=$request->player_id;
    //     $game_player->save();

    //     return response()->json($game_player);
        

    // }

    public function store(Request $request)
    {
        $this->validate($request,[
            'game_id'=>'required',
            'player_id'=>'required',
        ]);

        $game_id=$request->game_id;
        $player_id=$request->player_id;
        $t=time();
        $gameplayer_id=$game_id."00".$player_id."9999".$t;
        $game_player=new GamePlayer;
        $game_player->id=$gameplayer_id;
        $game_player->game_id=$request->game_id;
        $game_player->player_id=$request->player_id;
        $game_player->save();

        
        $player_score=new Score;
        $player_score->gameplayer_id=$gameplayer_id;
        $player_score->game_id=$request->game_id;
        $player_score->player_id=$request->player_id;
        $player_score->sex=$request->sex;
        $player_score->gate_1=0;
        $player_score->gate_2=0;
        $player_score->gate_3=0;
        $player_score->gate_4=0;
        $player_score->gate_5=0;
        $player_score->gate_6=0;
        $player_score->gate_7=0;
        $player_score->gate_8=0;
        $player_score->gate_9=0;
        $player_score->gate_10=0;
        $player_score->gate_11=0;
        $player_score->gate_12=0;
        $player_score->final_score=0;
        $player_score->save();

        return back();
    }

    public function delete(Request $request)
    {
        
        $game_id=$request->game_id;
        $player_id=$request->player_id;
        $condition=['player_id'=>$player_id,'game_id'=>$game_id];
        $gameplayer_id=GamePlayer::all()->where('game_id',$game_id)->where('player_id',$player_id);

        // dd($gameplayer_id);
        DB::table('game_players')->where('game_id',$game_id)->where('player_id',$player_id)->delete();
        DB::table('scores')->where('game_id',$game_id)->where('player_id',$player_id)->delete();
        return back();
    }
}
