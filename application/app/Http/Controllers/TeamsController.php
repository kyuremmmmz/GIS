<?php

namespace App\Http\Controllers;

use App\Models\teams;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function teams()
    {
        $teams = teams::select('*')->orderBy('team', 'asc')->get();
        return view('teams',compact('teams'));
    }

    public function RegisterTeams(Request $request)
    {
        $data = $request->validate([
            'team' => 'required|string'
        ]);

        $create = teams::create($data);

        return redirect()->back()->with('status', 'success');
    }


    public function Update(Request $request, teams $teams)
    {
        $data = $request->validate([
            'team' =>'required | string'
        ]);

        $teams->update($data);
        return redirect()->route('teams', compact('teams'))->with('status', 'Updated Successfully');
    }

    public function delete(teams $teams)
    {
        $teams->delete();
        return redirect()->route('teams')->with('status', 'Deleted Successfully');
    }

}
