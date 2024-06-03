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


}
