<?php

namespace App\Http\Controllers;

use App\Models\teams;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function teams()
    {
        $teams = teams::select('*');
        return view('teams',compact('teams'));
    }

    public function RegisterTeams(Request $request)
    {
        $data = $request->validate([
            'team' => 'required | string'
        ]);

        $create = teams::create($data);

        return redirect()->back()->with('status', 'success');
    }

    public function SeeTeams(teams $teams){
        return view('editTeams', compact('teams'));
    }

    public function Update(Request $request, teams $teams)
    {
        $data = $request->validate([
            'team' =>'required | string'
        ]);

        $teams->update($data);
        return redirect()->back()->with('status', 'Updated Successfully');
    }

    public function delete(teams $teams)
    {
        $teams->delete();
        return redirect()->back()->with('status', 'Deleted Successfully');
    }

}
