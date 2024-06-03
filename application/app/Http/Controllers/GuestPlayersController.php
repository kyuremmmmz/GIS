<?php

namespace App\Http\Controllers;

use App\Models\comittee\players;
use App\Models\player_rankings;

class GuestPlayersController extends Controller
{
    public function show()
    {
        $id = players::select('*')->orderBy('name', 'ASC')->get();
        return view('guest/players', compact('id'));
    }

    public function back()
    {
        return view('welcome');
    }

    public function showRankings()
    {
        $id = player_rankings::select('*')->orderBy('points', 'DESC')->get();
        return view('guest/playersRankingGuest', compact('id'));
    }
}
