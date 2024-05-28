<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\GameAdminController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/games/games', function () {
    return view('games.games');
})->middleware(['auth', 'verified'])->name('game1.index');


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
    Route::get('admin/adminForgotpass', [AdminLoginController::class, 'forgotpassword'])->name('forgotpassword');
    Route::post('admin/adminForgotpass', [AdminLoginController::class, 'forgotpasswordFunctionality'])->name('email.forgotpassword');
    Route::get('admin/users', [AdminLoginController::class, 'users'])->name('user');
    Route::delete('/admin/{adminID}/delete', [AdminLoginController::class, 'deleteUsers'])->name('delete.User');


// This Route function is for email verification sendings
Route::get('/admin/verification', function()
{
    return view('admin.verification');
})->middleware('auth')->name('verification.sent');


// TODO: Make a function that i can request sendings to my gmail account

Route::get('admin/verification/{id}/{hash}', function(EmailVerificationRequest $request){
    $request->fulfill();

    return redirect(route('verification.sent'));
})->middleware(['auth', 'signed'])->name('email.requestSend');

Route::post('/admin/');
