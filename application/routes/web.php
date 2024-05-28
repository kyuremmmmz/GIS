<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\GameAdminController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/games/games', [GameAdminController::class, 'games'])->name('game1.index');
    Route::put('/games/{id}/update', [GameAdminController::class, 'update'])->name('game.update');
    Route::delete('/games/{id}/delete', [GameAdminController::class, 'delete'])->name('game.delete');
    Route::get('/admin/admin', [AdminLoginController::class, 'see'])->name('admin.see');
    Route::post('/admin/admin', [AdminLoginController::class, 'createUser'])->name('admin.createUser');
    Route::get('/admin/adminLogin',  [AdminLoginController::class, 'seeLogin'])->name('admin.seeLogin');
    Route::post('admin/adminLogin', [AdminLoginController::class,'login'])->name('admin.login');
    Route::post('admin/adminLogout',  [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('admin/adminForgotpass', [AdminLoginController::class, 'forgotpassword'])->name('forgotpassword');
    Route::post('admin/adminForgotpass', [AdminLoginController::class, 'forgotpasswordFunctionality'])->name('email.forgotpassword');

});



