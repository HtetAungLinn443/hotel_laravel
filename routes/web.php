<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\View\ViewController;
use App\Http\Controllers\Dashboard\HomeController;

Route::get('/', function () {
    return redirect('admin-backend/login');
});
Route::prefix('admin-backend')->group(function () {
    Route::get('/login', [AuthController::class, 'index']);
    Route::post('/login', [AuthController::class, 'adminLogin'])->name('adminLogin');
    Route::get('/logout', [AuthController::class, 'adminLogout'])->name('adminLogout');
});

Route::group(['prefix' => 'admin-backend', 'middleware' => 'admin_auth'], function () {
    Route::get('index', [HomeController::class, 'dashboard']);
    Route::prefix('view')->group(function () {
        Route::get('', [ViewController::class, 'viewLists'])->name('viewLists');

        Route::get('create', [ViewController::class, 'viewCreate'])->name('viewCreate');
        Route::post('store', [ViewController::class, 'viewStore'])->name('viewStore');

        Route::get('edit', [ViewController::class, 'viewEdit'])->name('viewEdit');
        Route::post('update', [ViewController::class, 'viewUpdate'])->name('viewUpdate');
    });
});