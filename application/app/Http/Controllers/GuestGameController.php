<?php

namespace App\Http\Controllers;

use App\Models\gameInfoModel;

class GuestGameController extends Controller
{
    public function seeGuest()
    {
        $gamesCount = gameInfoModel::select(['id', 'teamname', 'wins'])
                                    ->take(3)
                                    ->get();

        return view('guest/dashboard', ['gamesCount' => $gamesCount]);
    }

    public function games()
    {
        return view('guest/games');
    }
}
