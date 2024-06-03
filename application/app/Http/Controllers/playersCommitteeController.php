<?php

namespace App\Http\Controllers;

use App\Models\player_rankings;
use App\Models\players;
use Illuminate\Http\Request;

class playersCommitteeController extends Controller
{
    public function seePlayersComittee()
    {
        $players = players::select('*')->orderBy('teamname', 'ASC')->get();
        return view('comittee/playersComittee', compact('players'));
    }

    public function createPlayersComittee(Request $request)
    {
        $data = $request->validate([
            'id'=>'required',
            'name' => 'required',
            'teamname' => 'required|string',
            'age'=>'required|integer'
        ]);

        $createData = players::create($data);
        return redirect()->back()->with('create', 'Created Successfully');
    }

    public function editPlayers(players $data)
    {
        return view('comittee/editPlayers', ['data' => $data]);
    }

    public function updatePlayers(Request $request, players $data)
    {
        $dataUpdate = $request->validate([
                        'id'=>'required',
                        'name' => 'required',
                        'teamname' => 'required|string',
                        'age'=>'required|integer']);
        $data->update($dataUpdate);
        return redirect()->route('comitteePlayers', ['data'=>$data] )->with('status', 'Updated Successfully');
    }

    public function deleteData(players $data)
    {
        $data->delete();
        return redirect()->back();
    }

    public function seePlayerRanks()
    {
        $id = player_rankings::select('*')->orderBy('points', 'desc')->get();
        return view('comittee/playersRanking', ['id' => $id]);
    }

    public function createPlayerRanking(Request $request, player_rankings $create)
    {
        $data = $request->validate([
            'name'=>'required',
            'points'=>'required',
            'age'=>'required|integer',
            'playerID'=>'required|integer',
            'teamname'=>'required|string',
        ]);

        $create = player_rankings::create($data);

        return redirect()->back()->with('status', ''.$create.' has created successfully');
    }


    public function seeEditPlayersRanking(player_rankings $data)
    {
        return view('comittee/editPlayersRanking ', ['data'=>$data]);
    }


    public function editPlayerRankings(Request $request, player_rankings $data)
    {
        $updateData = $request->validate([
                        'name'=>'required',
                        'points'=>'required',
                        'age'=>'required|integer',
                        'playerID'=>'required|integer',
                        'teamname'=>'required|string',
                        ]);
        $data->update($updateData);
        return redirect()->route('seePlayerRanks', ['data' => $data]);
    }


}
