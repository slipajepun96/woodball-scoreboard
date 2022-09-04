<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game;
use App\Models\Player;
use App\Models\Score;

class GamePlayer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'game_id',
        'player_id',
        'group'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function score()
    {
        return $this->hasMany(Score::class);
    }
}
