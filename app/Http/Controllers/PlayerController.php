<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    public function index()
    {
        $player_lists=Player::all();
        return view('admin.players.index',['player_lists'=>$player_lists]);
    }

    public function add()
    {
        return view('admin.players.add');
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'organisation'=>'required',
            'sex'=>'required'
        ]);


        $player=new Player();
        $player->name=$request->name;
        $player->organisation=$request->organisation;
        $player->sex=$request->sex;

        $player->save();
        Session::flash('status','New player successfully added');
        return redirect('/admin/players/');
    }

    public function delete($id)
    {
        DB::table('players')->where('id',$id)->delete();
        Session::flash('delete','Player deleted');
        return redirect('/admin/players/');
    }
}
