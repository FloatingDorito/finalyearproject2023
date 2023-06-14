<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Artist\Portfolio\PortfolioController;
use App\Http\Livewire\Artist\Portfolio\ManagePortfolio;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', [LogoutController::class, 'signOut'])->name('sign.out');
 });
  

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home/{username}', [HomeController::class, 'userHome'])->name('user.home');
});

Route::middleware(['auth', 'user-access:artist'])->group(function () {
    Route::get('/artist/{username}/portfolio/list', PortfolioController::class)->name('artist.portfolio');
    Route::get('/artist/{username}/portfolio/create', ManagePortfolio::class)->name('artist.create.portfolio');
    Route::get('/artist/{username}/portfolio/edit/{portfolio:id?}', ManagePortfolio::class)->name('artist.edit.portfolio');
    Route::get('/artist/{username}/home', [HomeController::class, 'artistHome'])->name('artist.home');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});