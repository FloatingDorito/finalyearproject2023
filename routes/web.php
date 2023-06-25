<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Artist\Portfolio\PortfolioController;
use App\Http\Livewire\Artist\Portfolio\ManagePortfolio;
use App\Http\Livewire\Artist\Commission\CommissionController;
use App\Http\Livewire\Artist\Commission\ManageCommission;
use App\Http\Livewire\Artist\Commission\ViewCommission;
use App\Http\Livewire\Artist\Order\CommissionApproval;
use App\Http\Livewire\Artist\Order\CommissionOngoing;
use App\Http\Livewire\Artist\Order\CommissionCompleted;
use App\Http\Livewire\Artist\Order\ViewCommissionOrder;
use App\Http\Livewire\Artist\Order\UploadCommissionImage;
use App\Http\Livewire\Artist\ArtistDashboard;
use App\Http\Livewire\Artist\ArtistSettings;
use App\Http\Livewire\User\UserDashboard;
use App\Http\Livewire\User\Artist\ArtistList;
use App\Http\Livewire\User\Commission\CommissionList;
use App\Http\Livewire\User\Commission\CommissionPurchase;
use App\Http\Livewire\User\Commission\PaymentUnsuccess;
use App\Http\Livewire\User\Commission\PaymentSuccess;
use App\Http\Livewire\User\Chat;
use App\Http\Controllers\CheckoutController;
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
    Route::get('/user/{username}/chat', Chat::class)->name('user.chat');
    Route::get('/user/{username}/artists', ArtistList::class)->name('user.artists');
    Route::get('/user/{username}/commissions', CommissionList::class)->name('user.commissions');
    Route::get('/user/{username}/commissions/view/{commission:id}', CommissionPurchase::class)->name('user.commissions.view');
    Route::get('/user/{username}/commissions/unpaid', PaymentUnsuccess::class)->name('user.commissions.unpaid.list');
    Route::get('/user/{username}/commissions/paid', PaymentSuccess::class)->name('user.commissions.paid.list');
    Route::get('/user/{username}/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/user/{username}/checkout/unsuccess', [CheckoutController::class, 'unsuccess'])->name('checkout.unsuccess');
});

Route::middleware(['auth', 'user-access:artist'])->group(function () {
    Route::get('/artist/{username}/portfolio/list', PortfolioController::class)->name('artist.portfolio');
    Route::get('/artist/{username}/portfolio/create', ManagePortfolio::class)->name('artist.create.portfolio');
    Route::get('/artist/{username}/portfolio/edit/{portfolio:id?}', ManagePortfolio::class)->name('artist.edit.portfolio');
    Route::get('/artist/{username}/orders/approval/list', CommissionApproval::class)->name('artist.order.approve');
    Route::get('/artist/{username}/orders/ongoing/list', CommissionOngoing::class)->name('artist.order.ongoing');
    Route::get('/artist/{username}/orders/completed/list', CommissionCompleted::class)->name('artist.order.completed');
    Route::get('/artist/{username}/orders/view/{order:id}', ViewCommissionOrder::class)->name('artist.order.view');
    Route::get('/artist/{username}/orders/upload-image/{order:id}', UploadCommissionImage::class)->name('artist.order.upload');
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