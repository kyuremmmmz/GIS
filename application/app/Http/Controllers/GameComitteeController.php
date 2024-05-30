<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;



class GameComitteeController extends Controller
{
    public function dashboardView()
    {
        return view('comittee.dashboard');
    }

    public function loginCommittee(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            ''

        ]);
    }
}
