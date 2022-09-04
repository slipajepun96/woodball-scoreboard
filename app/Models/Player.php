<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GamePlayer;
use App\Models\Score;

class Player extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'organisation',
        'sex'
    ];

    public function gamePlayer()
    {
        return $this->hasMany(GamePlayer::class);
    }

    public function score()
    {
        return $this->hasMany(Score::class);
    }
}
