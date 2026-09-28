<?php

use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\StoreController;
use App\Http\Controllers\User\TwoFactorAuthenticationController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'user',
    'as' => 'user.',
    'middleware' => ['auth:web']
], function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/2fa',[TwoFactorAuthenticationController::class,'index'])->name('2fa');

    Route::get('/store/create',[StoreController::class,'create'])->name('store.create');
    Route::middleware('user.has.store')->group(function () {
        Route::get('/store',[StoreController::class,'edit'])->name('store.edit');
    });


});
