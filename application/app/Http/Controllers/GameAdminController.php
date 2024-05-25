<?php

namespace App\Http\Controllers;
use App\Models\gameInfoModel;
use Illuminate\Http\Request;




class GameAdminController extends Controller
{
    public function index()
    {
        $games = gameInfoModel::all();
        return view('games.index', ['games' => $games]);
    }


    public function create(){

        return view('games.create');
    }



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
}
