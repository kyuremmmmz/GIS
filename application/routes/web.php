<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\GameAdminController;
use App\Http\Controllers\GameComitteeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('index', [GameAdminController::class,  'index'])->name('game.index');
    Route::get('create', [GameAdminController::class, 'create'])->name('game.create');
    Route::post('store', [GameAdminController::class, 'store'])->name('game.store');
    Route::get('{id}/edit', [GameAdminController::class, 'edit'])->name('game.edit');
    Route::get('games', [GameAdminController::class, 'games'])->name('game1.index');
    Route::put('{id}/update', [GameAdminController::class, 'update'])->name('game.update');
    Route::delete('{id}/delete', [GameAdminController::class, 'delete'])->name('game.delete');
    Route::get('/admin/admin', [AdminLoginController::class, 'see'])->name('admin.see');
    Route::post('/admin/admin', [AdminLoginController::class, 'createUser'])->name('admin.createUser');
    Route::get('/admin/adminLogin',  [AdminLoginController::class, 'seeLogin'])->name('admin.seeLogin');
    Route::post('admin/adminLogin', [AdminLoginController::class,'login'])->name('admin.login');
    Route::post('admin/adminLogout',  [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('admin/adminForgotpass', [AdminLoginController::class, 'forgotpassword'])->name('forgotpassword');
    Route::post('admin/adminForgotpass', [AdminLoginController::class, 'forgotpasswordFunctionality'])->name('email.forgotpassword');
    Route::get('admin/users', [AdminLoginController::class, 'users'])->name('user');
    Route::delete('/admin/{adminID}/delete', [AdminLoginController::class, 'deleteUsers'])->name('delete.User');

    Route::post('/admin/users', [App\Http\Controllers\ComitteeAuthController::class, 'createUser'])->name('comitteeCreate');




    //Comittee
    Route::get('comittee/dashboard', [GameComitteeController::class, 'dashboardView'])->name('comittee.dashboard');
});

require __DIR__.'/auth.php';








