<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'admin'])->name('admin');



Route::get('/{path}', function ($path) {
    if ($path === 'sample') {
        $post = DB::table('gameinformation')->get();
        return view('sample',[
            'post' => $post,
        ]);



    }

    return view('welcome');
});
