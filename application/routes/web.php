<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\GameAdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();


Route::get('/games/index', [GameAdminController::class,  'index'])->name('game.index');
Route::get('/games/create', [GameAdminController::class, 'create'])->name('game.create');
Route::post('/games/store', [GameAdminController::class, 'store'])->name('game.store');
Route::get('/games/{id}/edit', [GameAdminController::class, 'edit'])->name('game.edit');
Route::get('/games/games', [GameAdminController::class, 'games'])->name('game1.index');
Route::put('/games/{id}/update', [GameAdminController::class, 'update'])->name('game.update');
Route::delete('/games/{id}/delete', [GameAdminController::class, 'delete'])->name('game.delete');
Route::get('/admin/admin', [AdminLoginController::class, 'see'])->name('admin.see');
Route::post('/admin/admin', [AdminLoginController::class, 'createUser'])->name('admin.createUser');
Route::get('/admin/adminLogin',  [AdminLoginController::class, 'seeLogin'])->name('admin.seeLogin');
Route::post('admin/adminLogin', [AdminLoginController::class,'login'])->name('admin.login');
Route::post('admin/adminLogout',  [AdminLoginController::class, 'logout'])->name('admin.logout');


