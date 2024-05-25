<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

  public function getter(){
  $games  = DB::table('game_information_database')->select(
        'teamname',
        'wins',
        'losses',
        'game1',
        'game2',
        'game3',
        DB::raw('(wins+losses) AS games_played'),
        DB::raw('SUM(wins+losses) OVER (PARTITION BY teamname) AS total_games_played'),
        DB::raw('SUM(wins) OVER (PARTITION BY teamname)  AS total_wins'),
        DB::raw('SUM(losses) OVER (PARTITION BY teamname) AS total_losses'),
        DB::raw('SUM(game1 + game2 + game3) OVER (PARTITION BY teamname) AS final_score'))
        ->orderBy('total_wins', 'desc')
        ->get();
        return view('games.games', ['games' => $games]);
  }
}
