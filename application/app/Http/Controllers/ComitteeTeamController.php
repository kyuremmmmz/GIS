<?php

namespace App\Http\Controllers\comittee;

use App\Http\Controllers\Controller;
use App\Models\teams;
use Illuminate\Http\Request;

class ComitteeTeamController extends Controller
{
    public function comitteeTeamsView()
    {
        $data = teams::select('*')->orderBy('team', 'asc')->get();
        return view('comittee/teams', compact('data'));
    }
}
