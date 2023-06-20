<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Artist\Portfolio\PortfolioController;
use App\Http\Livewire\Artist\Portfolio\ManagePortfolio;
use App\Http\Livewire\Artist\Commission\CommissionController;
use App\Http\Livewire\Artist\Commission\ManageCommission;
use App\Http\Livewire\Artist\ArtistDashboard;
use App\Http\Livewire\Artist\Commission\ViewCommission;
use App\Http\Livewire\Artist\ArtistSettings;
use App\Http\Livewire\User\UserDashboard;
use App\Http\Livewire\User\Artist\ArtistList;
use App\Http\Livewire\User\Commission\CommissionList;
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
    Route::get('/user/dashboard/{username}', UserDashboard::class)->name('user.home');
    Route::get('/user/artists', ArtistList::class)->name('user.artists');
    Route::get('/user/commissions', CommissionList::class)->name('user.commissions');
});

Route::middleware(['auth', 'user-access:artist'])->group(function () {
    Route::get('/artist/{username}/portfolio/list', PortfolioController::class)->name('artist.portfolio');
    Route::get('/artist/{username}/portfolio/create', ManagePortfolio::class)->name('artist.create.portfolio');
    Route::get('/artist/{username}/portfolio/edit/{portfolio:id?}', ManagePortfolio::class)->name('artist.edit.portfolio');
    Route::get('/artist/{username}/commission/list', CommissionController::class)->name('artist.commission');
    Route::get('/artist/{username}/commission/view/{commission:id}', ViewCommission::class)->name('artist.commission.view');
    Route::get('/artist/{username}/commission/create', ManageCommission::class)->name('artist.create.commission');
    Route::get('/artist/{username}/commission/edit/{commission:id?}', ManageCommission::class)->name('artist.edit.commission');
    Route::get('/artist/{username}/account/settings', ArtistSettings::class)->name('artist.edit.account');
    Route::get('/artist/{username}/dashboard', ArtistDashboard::class)->name('artist.home');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/dashboard', [HomeController::class, 'adminHome'])->name('admin.home');
});