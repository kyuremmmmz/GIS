<?php

use App\Http\Controllers\auth\comitteeReset;
use App\Http\Controllers\ComitteeAuthControllerr;
use App\Http\Controllers\comitteeSettingsController;
use App\Http\Controllers\ComitteeTeamController;
use App\Http\Controllers\GameAdminController;
use App\Http\Controllers\GameComitteeController;
use App\Http\Controllers\GuestGameController;
use App\Http\Controllers\GuestPlayersController;
use App\Http\Controllers\GuestTeamsController;
use App\Http\Controllers\playersCommitteeController;
use App\Http\Controllers\playersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamsController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Models\Committee;
use App\Models\gameInfoModel;
use App\Models\player_rankings;
use App\Models\teams;
use App\Models\User;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Support\Facades\Route;

Route::get('welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    $gamesCount = gameInfoModel::select(['id', 'teamname', 'wins'])
    ->take(3)
    ->get();
    $count = player_rankings::select('*')
        ->take(5)
        ->orderBy('points', 'desc')
        ->get();
    $adminCount = User::count('Adminname');
    $ComitteeCount = Committee::count('name');
    $teams = teams::select('*')->orderBy('team', 'asc')->get();

    $total = $adminCount + $ComitteeCount;
    return view('/dashboard',compact('gamesCount', 'count', 'adminCount', 'ComitteeCount', 'teams', 'total'));
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

    ///COMITTEE CRUD
    Route::post('comitteeAuth/users', [ComitteeAuthControllerr::class, 'Creater'])->name('admin.createUser');
    Route::get('/comitteeAuth/adminLogin',  [ComitteeAuthControllerr::class, 'seeLogin'])->name('admin.seeLogin');
    Route::post('/comitteeAuth/adminLogin', [ComitteeAuthControllerr::class,'login'])->name('admin.login');
    Route::post('/comitteeAuth/adminLogout',  [ComitteeAuthControllerr::class, 'logout'])->name('admin.logout');
    Route::post('/comitteeAuth/adminForgotpass', [ComitteeAuthControllerr::class, 'forgotpasswordFunctionality'])->name('email.forgotpassword');
    Route::get('/comitteeAuth/users', [ComitteeAuthControllerr::class, 'users'])->name('user');
    Route::delete('/comitteeAuth/{adminID}/delete', [ComitteeAuthControllerr::class, 'deleteUsers'])->name('delete.User');

    Route::get('comittee/Settings/{comitteeID}', [comitteeSettingsController::class, 'comitteeSettings'])->name('ComitteeSettings');
    Route::put('comittee/Settings/{user}', [comitteeSettingsController::class, 'updateUser'])->name('UpdateUser');
    Route::delete('comittee/Settings/{user}', [ComitteeSettingsController::class, 'DeleteAccount'])->name('deleteUser');



    //GUESTS CRUD
    Route::get('guest/dashboard', [GuestGameController::class, 'seeGuest'])->name('seeGuest');
    Route::get('guest/games', [GuestGameController::class, 'games'])->name('seeGames');
    Route::get('guest/players', [GuestPlayersController::class, 'show'])->name('showPlayers');
    Route::get('welcome', [GuestPlayersController::class, 'back'])->name('out');
    Route::get('guest/playersRankingGuest', [GuestPlayersController::class, 'showRankings'])->name('rankings');

    //TEAMS
    Route::get('comittee/teams', [ComitteeTeamController::class, 'comitteeTeamsView'])->name('ComitteeTeams');
    Route::post('comittee/teams', [ComitteeTeamController::class, 'RegisterTeams'])->name('createComitteeTeams');
    Route::put('comittee/{data}/teams', [ComitteeTeamController::class, 'editTeams'])->name('editTeams');
    Route::delete('comittee/{data}/teams', [ComitteeTeamController::class, 'deleteTeams'])->name('deleteTeams');

    //GUEST TEAMS
    Route::get('guest/teams', [GuestTeamsController::class, 'guestTeams'])->name('MayIseeTeams');

    Route::get('comitteeAuth/ComitteeForgotPassword', [comitteeReset::class, 'PasswordCreate'])
    ->name('Comitteepassword.request');

    Route::post('comitteeAuth/ComitteeForgotPassword', [comitteeReset::class, 'PasswordStore'])
        ->name('Comitteepassword.email');

    Route::get('/comitteeAuth/users', [ComitteeAuthControllerr::class, 'users'])->name('user');
});



require __DIR__.'/auth.php';








