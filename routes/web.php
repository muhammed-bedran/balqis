<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('home');

require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
require __DIR__ . '/user.php';
// default guard  web->users table