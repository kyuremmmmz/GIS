<?php

namespace App\Http\Controllers;

use App\Models\player_rankings;
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
        $data = $request->validate(['id'=>'required',
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
            'id'=>'required|interger',
            'teamname'=>'required|string',
        ]);

        $create = player_rankings::create($playersRanks);

        return redirect()->back()->with('status', 'success');
    }
    public function viewEdit(players $playerNumber)
    {
        return view('PlayersEdit', ['playerNumber' => $playerNumber]);
    }


    public function editPlayers(Request $request, players $players)
    {
        $data = $request->validate(['id'=>'required',
                                    'name' => 'required',
                                    'teamname' => 'required|string',
                                    'age'=>'required|integer']);
        $players->update($data);
        return redirect(route('playersList', ['playerNumber'=>$players]))->with('success', 'Successfully updated players');
    }

    public function delete_data(players $delete)
    {
        $delete->delete();
        return redirect(route('playersList'))->with('success', 'Successfully deleted players');
    }

//PLAYER RANKINGS CONTROLLER
        public function seeRankings()
        {
            $players = player_rankings::select('*')->orderBy('points', 'desc')->get();
            return view('playerRankings', compact('players'));
        }

        public function createRanking(Request $request)
        {
            $data = $request->validate([
                'name'=>'required',
                'points'=>'required',
                'age'=>'required|integer',
                'playerID'=>'required|integer',
                'teamname'=>'required|string',
            ]);

            $createData = player_rankings::create($data);
            return redirect()->back()->with('status', 'success');
        }

}
