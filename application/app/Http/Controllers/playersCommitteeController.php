<?php

namespace App\Http\Controllers;

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


}
