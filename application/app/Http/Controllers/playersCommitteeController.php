<?php

namespace App\Http\Controllers;

use App\Models\players;
use Illuminate\Http\Request;

class playersCommitteeController extends Controller
{
    public function seePlayersComittee()
    {
        return view('comittee/playersComittee');
    }

    public function createPlayersComittee(Request $request, players $players)
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
}
