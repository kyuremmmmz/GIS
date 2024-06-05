<?php

use App\Http\Controllers\ComitteeAuthController;
use App\Http\Controllers\ComitteeTeamController;
use App\Http\Controllers\GameAdminController;
use App\Http\Controllers\GameComitteeController;
use App\Http\Controllers\GuestGameController;
use App\Http\Controllers\GuestPlayersController;
use App\Http\Controllers\playersCommitteeController;
use App\Http\Controllers\playersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamsController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Models\gameInfoModel;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Support\Facades\Route;

Route::get('welcome', function () {
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
    //TEAMS
    Route::get('teams', [TeamsController::class, 'teams'])->name('teams');
    Route::post('teams', [TeamsController::class, 'RegisterTeams'])->name('Createteams');
    Route::post('{teams}/teams', [TeamsController::class, 'Update'])->name('UpdateTeams');
    Route::delete('{teams}/teams', [TeamsController::class, 'delete'])->name('DeleteTeams');
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
    Route::post('comittee/players', [playersCommitteeController::class, 'createPlayersComittee'])->name('create');
    Route::get('comittee/{data}/PlayersEdit', [playersCommitteeController::class, 'editPlayers'])->name('editPlayersComittee');
    Route::put('comittee/{data}/PlayersEdit', [playersCommitteeController::class, 'updatePlayers'])->name('updatePlayerss');
    Route::delete('comittee/{data}/playersComittee', [playersCommitteeController::class, 'deleteData'])->name('deleteComitteePlayers');

    //COMITTEE EDIT PLAYER RANKINGS AND VIEW PLAYER RANKINGS
    Route::get('comittee/playersRanking', [playersCommitteeController::class, 'seePlayerRanks'])->name('seePlayerRanks');
    Route::post('comittee/playersRanking', [playersCommitteeController::class, 'createPlayerRanking'])->name('createPlayerRanking');
    Route::get('comittee/{data}/editPlayersRanking', [playersCommitteeController::class, 'seeEditPlayersRanking'])->name('editPlayerRanking');
    Route::put('comittee/{data}/editPlayersRanking', [playersCommitteeController::class, 'editPlayerRankings'])->name('editRankings');

    //COMITTEE CRUD
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
    Route::get('guest/players', [GuestPlayersController::class, 'show'])->name('showPlayers');
    Route::get('welcome', [GuestPlayersController::class, 'back'])->name('out');
    Route::get('guest/playersRankingGuest', [GuestPlayersController::class, 'showRankings'])->name('rankings');

    //TEAMS
    Route::get('comittee/teams', [ComitteeTeamController::class, 'comitteeTeamsView'])->name('ComitteeTeams');



});



require __DIR__.'/auth.php';








