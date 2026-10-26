<?php

use App\Http\Controllers\RolePermession\RoleController;
use App\Http\Controllers\RolePermession\UserRoleController;
use Illuminate\Support\Facades\Route;

$prefix = config('role-permession.ui.prefix', 'admin');
$namePrefix = config('role-permession.ui.route_name_prefix', 'role-permession.');
$middleware = config('role-permession.ui.middleware', ['web', 'auth:admin']);

Route::middleware($middleware)
    ->prefix($prefix)
    ->name($namePrefix)
    ->group(function () {
        Route::get('/users', [UserRoleController::class, 'index'])->name('users.index');
        Route::put('/users/{user}', [UserRoleController::class, 'update'])->name('users.update');

        Route::get('/', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('/{role}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });
