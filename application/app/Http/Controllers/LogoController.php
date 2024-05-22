<?php

namespace App\Http\Controllers;

use App\Models\Logo;

class LogoController extends Controller
{
    public function index()
    {
        $posts = Logo::all();
        return view('posts.index', compact('posts'));
    }
}
