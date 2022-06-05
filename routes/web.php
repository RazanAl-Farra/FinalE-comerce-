<?php

use App\Http\Controllers\Admin\CategoryContrpller;
use App\Http\Controllers\Admin\ProductContrpller;
use App\Http\Controllers\Admin\BrandContrpller;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithPaginationTheme;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('category',[App\Http\Controller\Admin\CategoryController::class, 'index']);
    Route::get('brand',[App\Http\Controller\Admin\BrandController::class, 'index']);
    Route::get('product',[App\Http\Controller\Admin\ProductController::class, 'index']);

    //Category Routes
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category/store', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });
Route::controller(App\Http\Controllers\Admin\BrandController::class)->group(function () {
    Route::get('/brands',App\Http\Livewire\Admin\Brand\Index::class);

});

    //Product Routes
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
    Route::get('/product', 'index');
    Route::get('/product/create', 'create');
    Route::post('/product/store', 'store');
    });


});


