<?php

use App\Livewire\AddGame;
use App\Livewire\Auth\Login;
use App\Livewire\Dashboard;
use App\Livewire\Game;
use App\Livewire\Home;
use App\Livewire\MenuManagement;
use App\Livewire\RolesPermissions;
use App\Livewire\User;
use Illuminate\Support\Facades\Route;
use App\Livewire\DiscoverGames;
use App\Livewire\Cart ;
use App\Livewire\GameDetail;
use App\Livewire\MyGames;
use App\Livewire\Transaction;

Route::get('/',Home::class)->name('home');
Route::get('/login', Login::class)->name('login');
Route::get('/logout', [Login::class, 'logout'])->name('logout');
Route::get('/games/discover', DiscoverGames::class)->name('games.discover');
Route::get('/games/detail/{id}', GameDetail::class)->name('game.detail');
Route::get('/cart', Cart::class)->name('cart.index');
Route::get('/games/my', MyGames::class)->name('games.my');
Route::get('/checkout/{id}', \App\Livewire\Checkout::class)->name('checkout');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/user', User::class)->name('user');
    Route::get('/menu', MenuManagement::class)->name('menu');
    Route::get('/roles', RolesPermissions::class)->name('role');
    Route::get('/game', Game::class)->name('game');
    Route::get('/game/add', AddGame::class)->name('game.add');
    Route::get('/game/edit/{id}', AddGame::class)->name('game.edit');
    Route::get('/transaction', Transaction::class)->name('transaction');
    Route::get('/test', MenuManagement::class)->name('test');
});
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});