<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\StoreController;


Route::group([
    'prefix' => '/admin/dashboard',
    'as' => 'dashboard.',
    'middleware' => ['auth']
], function () {

    Route::get('/index', [DashboardController::class, 'index'])
        ->name('index');
    // Categories Controller
    Route::get('/categories', [CategoriesController::class, 'index'])
        ->name('categories.index');
    Route::get('/categories/create', [CategoriesController::class, 'create'])
        ->name('categories.create');
    Route::post('/categories/store', [CategoriesController::class, 'store'])
        ->name('categories.store');
    Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])
        ->name('categories.edit');
    Route::get('/categories/show/{id}', [CategoriesController::class, 'show'])
        ->name('categories.show');
    Route::put('/categories/update/{id}', [CategoriesController::class, 'update'])
        ->name('categories.update');
    Route::delete('/categories/delete/{id}', [CategoriesController::class, 'destroy'])
        ->name('categories.destroy');
    // Store Controller
    Route::resource('stores', StoreController::class); // dashboard.store.index


});






// url-> dashboardcontrollerclass->index->dashboard.pages.index


                                                  //layouts . dashboard . index
        //dashboard.pages.index                     // yield('content')