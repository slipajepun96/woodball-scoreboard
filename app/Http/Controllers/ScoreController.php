<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use App\Models\GamePlayer;
use App\Models\Game;

class ScoreController extends Controller
{
    public function view($id)
    {
        $score_lists=Score::all()->where('game_id',$id);
        // dd($score_lists);
        return view('admin.scores.scorecard',['score_lists'=>$score_lists],['game_id'=>$id]);
    }

    public function update(Request $request,$id)
    {
        $gameplayer_list=GamePlayer::all()->where('game_id',$id);
        $num_of_player=count($gameplayer_list);

        // dd($request);
        //  dd($request);
        // dd($num_of_player);
        for($i=0;$i<$num_of_player;$i=$i+1)
        {
            unset($score_data);
            $gameplayer_id=$request->gameplayer_id;
            // $score_data=Score::find($gameplayer_id)->first();
            $score_data=Score::where('gameplayer_id','=',$request->gameplayer_id[$i])->first();
            // dd($score_data);
            if($score_data->gameplayer_id==$request->gameplayer_id[$i])
            {
            $score_data->gate_1=$request->gate_1[$i];
            $score_data->gate_2=$request->gate_2[$i];
            $score_data->gate_3=$request->gate_3[$i];
            $score_data->gate_4=$request->gate_4[$i];
            $score_data->gate_5=$request->gate_5[$i];
            $score_data->gate_6=$request->gate_6[$i];
            $score_data->gate_7=$request->gate_7[$i];
            $score_data->gate_8=$request->gate_8[$i];
            $score_data->gate_9=$request->gate_9[$i];
            $score_data->gate_10=$request->gate_10[$i];
            $score_data->gate_11=$request->gate_11[$i];
            $score_data->gate_12=$request->gate_12[$i];
            $final_score=0;
            $final_score=$request->gate_1[$i]+$request->gate_2[$i]+$request->gate_3[$i]+$request->gate_4[$i]+$request->gate_5[$i]+$request->gate_6[$i]+$request->gate_7[$i]+$request->gate_8[$i]+$request->gate_9[$i]+$request->gate_10[$i]+$request->gate_11[$i]+$request->gate_12[$i];
            $score_data->final_score=$final_score;
            // dd($score_data);
            $score_data->save();
            // echo $request->gameplayer_id[$i];
            // unset($score_data);
            }
            // $score_datas[]=$score_data;

        }
        // dd($score_datas) ;
        

        return back();
        
    }

    public function scoreboard_index()
    {
        $game_details=Game::all();
        return view('admin.scores.scoreboard',['game_details'=>$game_details]);
    }

    public function scoreboard_view($id)
    {
        $game_detail=Game::findOrFail($id);
        $score_lists=Score::all()->where('game_id',$id)->sortBy("final_score")->sortBy("gate_1");
        return view('admin.scores.scoreboard_view',['game_detail'=>$game_detail,'score_lists'=>$score_lists]);
    }
}
