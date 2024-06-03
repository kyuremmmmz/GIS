<?php

namespace App\Http\Controllers;

use App\Models\comittee\players;

class GuestPlayersController extends Controller
{
    public function show()
    {
        $id = players::select('*')->orderBy('name', 'ASC');
        return view('guest/players', compact('id'));
    }
}
