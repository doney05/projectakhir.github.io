<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
// use App\Http\Controllers\Admin\GaleriController;
// use App\Http\Controllers\Admin\TravelPackageController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')
    ->namespace('Admin')
    // ->middleware(['auth','admin']) //dari file kernel.php
        ->group(function()
        {
            Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');
            Route::resource('travel-package', TravelPackageController::class)
            ->except(['show', 'update']);
            Route::resource('galeri-travel', GaleriController::class);            
            Route::resource('transaction', TransaksiController::class);
});

Auth::routes();

