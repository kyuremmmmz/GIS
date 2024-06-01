<?php

namespace App\Http\Controllers;

use App\Models\players;

class playersController extends Controller
{
    public function players()
    {
        $players = players::all();
        return view('players', compact('players'));
    }
}
