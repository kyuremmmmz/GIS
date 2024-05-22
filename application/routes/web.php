<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GameAdminController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'admin'])->name('admin');





Route::get('/games/index', [GameAdminController::class,  'index'])->name('game.index');
Route::get('/games/create', [GameAdminController::class, 'create'])->name('game.create');
Route::post('/games/store', [GameAdminController::class, 'store'])->name('game.store');


