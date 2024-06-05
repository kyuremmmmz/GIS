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
}
