<?php

namespace App\Http\Controllers;

use App\Models\players;
use Illuminate\Http\Request;

class playersController extends Controller
{
    public function players()
    {
        $players = players::select('*')->orderBy('name', 'ASC')->orderBy('teamname', 'ASC');
        return view('players', compact('players'));
    }

    public function createPlayers(Request $request)
    {
        $data = $request->validate(['playerNumber'=>'requiered',
                                    'name' => 'required',
                                    'teamname' => 'required|string',
                                    'age'=>'required|integer']);
    }
}
