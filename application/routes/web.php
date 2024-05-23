<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GameAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'admin'])->name('admin');





Route::get('/games/index', [GameAdminController::class,  'index'])->name('game.index');
Route::get('/games/create', [GameAdminController::class, 'create'])->name('game.create');
Route::post('/games/store', [GameAdminController::class, 'store'])->name('game.store');
Route::get('/games/{id}/edit', [GameAdminController::class, 'edit'])->name('game.edit');
Route::get('/games/games', [GameAdminController::class, 'games'])->name('game1.index');

