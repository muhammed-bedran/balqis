<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\CategoriesController;
 


Route::group([
    'prefix'=>'/admin/dashboard',
    'as'=>'dashboard.'
],function(){

    Route::get('/index', [DashboardController::class, 'index'])
    ->name('index');
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

});






// url-> dashboardcontrollerclass->index->dashboard.pages.index


                                                  //layouts . dashboard . index
        //dashboard.pages.index                     // yield('content')