<?php

namespace App\Http\Controllers;
use App\Models\teams;
use Illuminate\Http\Request;

class ComitteeTeamController extends Controller
{
    public function comitteeTeamsView()
    {
        $data = teams::select('*')->orderBy('team', 'asc')->get();
        return view('comittee/teams', compact('data'));
    }

    public function RegisterTeams(Request $request)
    {
        $data = $request->validate([
            'team'=> 'required | string',
        ]);

        $create = teams::create($data);

        return redirect()->back()->with('create', 'Created Successfully');
    }

    public function editTeams(Request $request, teams $dataa)
    {
        $data = $request->validate([
            'team'=>'required | string'
        ]);

        $dataa->update($data);
        return redirect()->route('teams', compact('dataa'))->with('status', 'Updated Successfully');
    }

    public function deleteTeams(teams $dataa)
    {
        $dataa->delete();
        return redirect()->route('teams')->with('status', 'Deleted Successfully');
    }


}
