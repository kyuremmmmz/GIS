<?php

namespace App\Http\Controllers;
use App\Models\gameInfoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GameAdminController extends Controller
{







    public function store(Request $request){
        $validator = $request->validate([
            'teamname'=> 'required',
            'game1'=> 'required',
            'game2' =>  'required',
            'game3' => 'required',
            'wins'  => 'required',
            'losses' => 'required',
            'date_played' => 'required',

        ]);

        $postData = gameInfoModel::create($validator);

        return redirect(route('game1.index'));
    }

    public function edit(gameInfoModel $id){
        return view('edit',['game'=>$id]);


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
                            return view('games', ['games' => $games]);
    }


    public function update(gameInfoModel $id, Request $request)
    {
        $data = $request->validate([
            'teamname'=> 'required',
            'game1'=> 'required',
            'game2' =>  'required',
            'game3' => 'required',
            'wins'  => 'required',
            'losses' => 'required',
            'date_played' => 'required',
        ]);
        $id->update($data);

        return redirect(route('game1.index', ['id' => $id]))->with('success', 'Success update!');
    }

    public function delete(gameInfoModel $id)
    {
        $id->delete();
        return redirect(route('game1.index'))->with('success', 'Success delete!');
    }


}
