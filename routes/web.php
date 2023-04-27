<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;

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

Route::get('/', function () {
    return to_route('login');
});

Auth::routes();

Route::controller(DashboardController::class)->middleware(['auth'])->name('user.')->group(function () {
    Route::get('/dashboard','index')->name('dashboard');
    Route::get('/products', 'products')->name('products');
    Route::get('/settings', 'getSettings')->name('getSettings');
    Route::post('/settings', 'postSettings')->name('postSettings');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
