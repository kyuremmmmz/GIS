<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function createUser(AdminModel $adminModel ,Request $request)
    {
        $datavalidation = $request->validate([
            'name' => 'required|string|max:225',
            'adminID'=>'required|string|max:16|',
            'password'=>'required|string|max:8|confirmed',
        ]);


        $user = new User();

        $user->name = $datavalidation['name'];
        $user->adminID = $datavalidation['adminID'];
        $user->password = bcrypt($datavalidation['password']);
        $user->save();

        return view('games.index')->with('user', $user);
        if (Auth::check()) {
            return redirect()->route('games.index')->with('user', $user);
        } else {
            return view('admin.admin');
        }





    }


    public function see()
    {
        return view('admin.admin');
    }
}
