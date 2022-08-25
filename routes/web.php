<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

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

Route::get('/', function () {
    return view('index');
});

Route::middleware(['auth'],['preventBackHistory'])->group(function()
{
    //games and scores
    Route::post('admin/games/add',[GameController::class,'store'])->name('games-store');
    Route::post('admin/games/edit/{id}',[GameController::class,'update'])->name('games-update');
    Route::post('admin/games/delete/{id}',[GameController::class,'delete'])->name('games-delete');
    Route::get('/admin/games',[GameController::class,'index'])->name('games-index');
    Route::get('/admin/games/add',[GameController::class,'add'])->name('games-add');
    Route::get('/admin/games/edit/{id}',[GameController::class,'edit'])->name('games-edit');
    Route::get('/admin/games/view/{id}',[GameController::class,'view'])->name('games-view');

});
