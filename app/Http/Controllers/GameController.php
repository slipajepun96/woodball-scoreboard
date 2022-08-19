<?php

namespace App\Http\Controllers;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games_lists=Game::all();
        return view('admin.games&scores.index',['games_lists'=>$games_lists]);
    }

    public function store()
    {
        return view('admin.games&scores.add');
    }
}
