<?php

namespace App\Http\Controllers;

use App\Models\teams;

class GuestTeamsController extends Controller
{
    public function guestTeams()
    {
        $id =  teams::select('*')->orderBy('team', 'ASC')->get('id');
        return view('guest/teams', compact('id'));
    }
}
