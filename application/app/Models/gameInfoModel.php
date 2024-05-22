<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gameInfoModel extends Model
{
    use HasFactory;
    protected $fillable =  [
        'games',
        'player_standing',
        'players',
        'team_standing',
        'date_played',
    ];
}
