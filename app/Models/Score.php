<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game;
use App\Models\Player;
use App\Models\GamePlayer;

class Score extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'game_id',
        'player_id',
        'sex',
        'gameplayer_id',
        'gate_1',
        'gate_2',
        'gate_3',
        'gate_4',
        'gate_5',
        'gate_6',
        'gate_7',
        'gate_8',
        'gate_9',
        'gate_10',
        'gate_11',
        'gate_12',
        'final_score',];

        public function game()
        {
            return $this->belongsTo(Game::class);
        }
    
        public function player()
        {
            return $this->belongsTo(Player::class);
        }
        
        public function gamePlayer()
        {
            return $this->belongsTo(GamePlayer::class);
        }
    
    

}
