<?php

use App\Http\Controllers\ComitteeAuthController;
use App\Http\Controllers\GameAdminController;
use App\Http\Controllers\GameComitteeController;
use App\Http\Controllers\GuestGameController;
use App\Http\Controllers\playersCommitteeController;
use App\Http\Controllers\playersController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Models\gameInfoModel;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    $gamesCount = gameInfoModel::select('id', 'teamname', 'wins',
                    )
                    ->take(3)
                    ->orderBy('wins', 'desc')
                    ->get();
    return view('dashboard', compact('gamesCount'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');;
    Route::get('create', [GameAdminController::class, 'create'])->name('game.create');
    Route::post('store', [GameAdminController::class, 'store'])->name('game.store');
    Route::get('{id}/edit', [GameAdminController::class, 'edit'])->name('game.edit');
    Route::get('games', [GameAdminController::class, 'games'])->name('game1.index');
    Route::put('{id}/update', [GameAdminController::class, 'update'])->name('game.update');
    Route::delete('{id}/delete', [GameAdminController::class, 'delete'])->name('game.delete');
    Route::get('/comitteeAuth/admin', [ComitteeAuthController::class, 'see'])->name('admin.see');
    Route::post('/comitteeAuth/admin', [ComitteeAuthController::class, 'createUser'])->name('admin.createUser');
    //PLAYERS CRUD
    Route::get('players', [playersController::class, 'players'])->name('playersList');
    Route::post('players', [playersController::class, 'createPlayers'])->name('createPlayers');
    Route::get('{playerNumber}/PlayersEdit', [playersController::class, 'viewEdit'])->name('viewEdit');
    Route::put('{players}/PlayersEdit', [playersController::class, 'editPlayers'])->name('editPlayers');
    Route::delete('{delete}/players', [playersController::class, 'delete_data'])->name('destroy');
    //PLAYER RANKINGS CRUD
    Route::get('playerRankings', [playersController::class, 'seeRankings'])->name('viewRankings');
    Route::post('playerRankings', [playersController::class, 'createRanking'])->name('createPlayerRankings');
    Route::get('{id}/PlayerRankingsEdit', [playersController::class, 'seeRankingsEdit'])->name('editPlayerRankings');
    Route::put('{id}/PlayerRankingsUpdate', [playersController::class, 'updatePlayerRankings'])->name('updatePlayerRankings');
    Route::delete('{data}/playerRankings', [playersController::class, 'deletaPlayerRankings'])->name('deletePlayerRankings');
});


Route::middleware([EncryptCookies::class, EnsureTokenIsValid::class, ])->group(function (){
//COMITTEE COMPONENTS
Route::get('comittee/games', [GameComitteeController::class, 'see'])->name('view.Game');
Route::post('comittee/games', [GameComitteeController::class, 'createGame'])->name('create.Game');
Route::get('comittee/dashboard', [GameComitteeController::class, 'top3'])->name('top3');
Route::delete('comittee/{id}/dashboard', [GameComitteeController::class, 'delete'])->name('delete');
Route::get('comittee/{id}/edit', [GameComitteeController::class, 'edit'])->name('edit');
Route::put('comittee/{id}/update', [GameComitteeController::class, 'update'])->name('update');
Route::get('comittee/playersComittee', [playersCommitteeController::class, 'seePlayersComittee'])->name('comitteePlayers');

//COMITTEE CRUD CODE
Route::get('/comitteeAuth/adminLogin',  [ComitteeAuthController::class, 'seeLogin'])->name('admin.seeLogin');
Route::post('/comitteeAuth/adminLogin', [ComitteeAuthController::class,'login'])->name('admin.login');
Route::post('/comitteeAuth/adminLogout',  [ComitteeAuthController::class, 'logout'])->name('admin.logout');
Route::get('/comitteeAuth/adminForgotpass', [ComitteeAuthController::class, 'forgotpassword'])->name('forgotpassword');
Route::post('/comitteeAuth/adminForgotpass', [ComitteeAuthController::class, 'forgotpasswordFunctionality'])->name('email.forgotpassword');
Route::get('/comitteeAuth/users', [ComitteeAuthController::class, 'users'])->name('user');

Route::delete('/comitteeAuth/{adminID}/delete', [ComitteeAuthController::class, 'deleteUsers'])->name('delete.User');



//GUESTS CRUD
Route::get('guest/dashboard', [GuestGameController::class, 'seeGuest'])->name('seeGuest');
Route::get('guest/games', [GuestGameController::class, 'games'])->name('seeGames');
});



require __DIR__.'/auth.php';








