<?php

namespace App\Http\Controllers;

use App\Models\players;

class playersController extends Controller
{
    public function players()
    {
        $players = players::select('*')->orderBy('name', 'ASC')->orderBy('teamname', 'ASC');
        return view('players', compact('players'));
    }
}
