<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestGameController extends Controller
{
    public function seeGames()
    {
        return view('guest/dashboard');
    }
}
