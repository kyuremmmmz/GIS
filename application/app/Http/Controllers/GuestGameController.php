<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\gameInfoModel;
use App\Models\player_rankings;
use App\Models\teams;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class GuestGameController extends Controller
{
    public function seeGuest()
    {
        $gamesCount = gameInfoModel::select(['id', 'teamname', 'wins'])
        ->take(3)
        ->get();
        $count = player_rankings::select('*')
            ->take(5)
            ->orderBy('points', 'desc')
            ->get();
        $adminCount = User::count('Adminname');
        $ComitteeCount = Committee::count('name');
        $teams = teams::select('*')->orderBy('team', 'asc')->get();
        $data = User::select('*')->orderBy('Adminname')->get();
        $dataa = Committee::select('*')->orderBy('name')->get();

        $total = $adminCount + $ComitteeCount;
        return view('guest/dashboard',compact('gamesCount', 'count', 'adminCount', 'ComitteeCount', 'teams', 'total', 'data', 'dataa'));

    }

    public function games()
    {
        $games = gameInfoModel::select('*',
                                        DB::raw('(wins + losses) AS games_played'),
                                        DB::raw('SUM(wins + losses) OVER (PARTITION BY teamname) AS total_games_played'),
                                        DB::raw('SUM(wins) OVER (PARTITION BY teamname) AS total_wins'),
                                        DB::raw('SUM(losses) OVER (PARTITION BY teamname) AS total_losses'),
                                        DB::raw('SUM(game1 + game2 + game3) OVER (PARTITION BY teamname) AS final_score'),
                                        DB::raw('(SUM(wins) OVER (PARTITION BY teamname) / (SUM(wins) OVER (PARTITION BY teamname) + SUM(losses) OVER (PARTITION BY teamname))) * 100 AS fpg'))
                                        ->orderBy('total_wins', 'desc')
                                        ->orderBy('final_score', 'desc')
                                        ->orderBy('fpg',  'desc')
                                        ->get();
        return view('guest/games', compact('games'));
    }
}
