<?php

namespace App\Http\Controllers;
use App\Models\gameInfoModel;
use Illuminate\Http\Request;




class GameAdminController extends Controller
{
    public function index()
    {
        $games = gameInfoModel::all()->count();
        return view('games.index', ['games' => $games]);
    }

    public function usercount()
    {
        $games = gameInfoModel::all()->count();
        return view('games.index', ['games' => $games]);
    }

    public function create(){

        return view('games.create');
    }

    public function store(Request $request){
        $validator = $request->validate([
                    'games'=>'required',
                    'player_standing'=>'required',
                    'players'=>'required',
                    'team_standing'=>'required',
                    'date_played'=>'required',
        ]);

        $postData = gameInfoModel::create($validator);

        return redirect(route('game.index'));
    }

    public function edit(gameInfoModel $id){
        return view('games.edit',['game'=>$id]);


    }

    public function games()
    {
        $games  = gameInfoModel::all();
        return view('games.games', ['games' => $games]);
    }

    public function update(gameInfoModel $id, Request $request)
    {
        $validator = $request->validate([
            'games'=>'required',
            'player_standing'=>'required',
            'players'=>'required',
            'team_standing'=>'required',
            'date_played'=>'required',
    ]);
         $id->update($validator);
         return redirect(route('game1.index', ['id'=>$id]))->with('success', 'Success!');
    }
}
