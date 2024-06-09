<?php

namespace App\Http\Controllers;

use App\Models\teams;

class TeamsGuestController extends Controller
{
    public function GuestTeams()
    {
        $teams = teams::select('*')->orderBy('name', 'asc')->get();
        return view('guest/dashboard', compact('teams'));
    }
}
