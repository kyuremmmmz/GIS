<?php

namespace App\Http\Controllers;

use App\Models\players;
use Illuminate\Http\Request;

class playersController extends Controller
{
    public function players()
    {
        $players = players::select('*')->orderBy('teamname', 'ASC')->get();
        return view('players', compact('players'));
    }

    public function createPlayers(Request $request, players $create)
    {
        $data = $request->validate(['playerNumber'=>'required',
                                    'name' => 'required',
                                    'teamname' => 'required|string',
                                    'age'=>'required|integer']);

        $create = players::create($data);

        return redirect()->back()->with('status', 'success');


    }


    public function CreatePlayerRankings(Request $request)
    {
        $playersRanks = $request->validate([
            'name'=>'required',
            'points'=>'required',
            'age'=>'required|integer',
            'playerID'=>'required|interger',
            'teamname'=>'required|string',
        ]);

        $create = players::findOrFail($playersRanks['playerID']);
        $create->player_ranking()->create($playersRanks);
    }
}
