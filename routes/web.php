<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GamePlayerController;
use App\Http\Controllers\ScoreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

//scores-public
Route::post('/scoreboard/{id}',[ScoreController::class,'scoreboard_view']);
Route::get('/scoreboard',[ScoreController::class,'scoreboard_index'])->name('scoreboard-index');
Route::get('/',[ScoreController::class,'scoreboard_index'])->name('scoreboard-index');

Route::middleware(['auth'],['preventBackHistory'])->group(function()
{
    //games and scores
    Route::post('admin/games/add',[GameController::class,'store'])->name('games-store');
    Route::post('admin/games/edit/{id}',[GameController::class,'update'])->name('games-update');
    Route::post('admin/games/delete/{id}',[GameController::class,'delete'])->name('games-delete');
    Route::post('admin/games/players/add/',[GamePlayerController::class,'store'])->name('gameplayers-store');
    Route::post('admin/games/players/delete/',[GamePlayerController::class,'delete'])->name('gamesplayers-delete');
    Route::get('/admin/games',[GameController::class,'index'])->name('games-index');
    Route::get('/admin/games/add',[GameController::class,'add'])->name('games-add');
    Route::get('/admin/games/edit/{id}',[GameController::class,'edit'])->name('games-edit');
    Route::get('/admin/games/view/{id}',[GameController::class,'view'])->name('games-view');
    Route::get('/admin/games/players/{id}',[GamePlayerController::class,'index'])->name('gameplayers-index');
    // Route::get('/admin/games/players/fetch/{id}',[GamePlayerController::class,'fetchPlayer'])->name('gameplayers-fetchPlayer');

    //players
    Route::post('/admin/players/add',[PlayerController::class,'store'])->name('players-store');
    Route::post('/admin/players/delete/{id}',[PlayerController::class,'delete']);
    Route::get('/admin/players',[PlayerController::class,'index'])->name('players-index');
    Route::get('/admin/players/add',[PlayerController::class,'add'])->name('players-add');

    //scores
    Route::post('/admin/games/{id}/scorecard',[ScoreController::class,'update'])->name('scorecard-update');
    Route::get('/admin/games/{id}/scorecard',[ScoreController::class,'view'])->name('scorecard');
});
