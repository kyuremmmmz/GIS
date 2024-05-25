<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gameInfoModel extends Model
{
    use HasFactory;

    protected $table = 'game_information_database';
    protected $fillable =  [
        'teamname',
        'game1',
        'game2',
        'game3',
        'wins',
        'losses',
        'date_played',
        'updated_at',
        'created_at',

    ];
}
