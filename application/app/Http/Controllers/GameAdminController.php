<?php

namespace App\Http\Controllers;
use App\Models\gameInfoModel;
use Illuminate\Http\Request;




class GameAdminController extends Controller
{
    public function index()
    {
        return view('games.index');
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



    }
}
