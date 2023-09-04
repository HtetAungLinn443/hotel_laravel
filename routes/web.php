<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Bed\BedController;
use App\Http\Controllers\View\ViewController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Amenity\AmenityController;
use App\Http\Controllers\Feature\FeatureController;
use App\Http\Controllers\Room\RoomController;

Route::get('/', function () {
    return redirect('admin-backend/login');
});
Route::prefix('admin-backend')->group(function () {
    Route::get('/login', [AuthController::class, 'index']);
    Route::post('/login', [AuthController::class, 'adminLogin'])->name('adminLogin');
    Route::get('/logout', [AuthController::class, 'adminLogout'])->name('adminLogout');
});

Route::group(['prefix' => 'admin-backend', 'middleware' => 'admin_auth'], function () {
    Route::get('index', [HomeController::class, 'dashboard'])->name('dashboard');
    // For View
    Route::prefix('view')->group(function () {
        Route::get('', [ViewController::class, 'viewLists'])->name('viewLists');
        Route::get('create', [ViewController::class, 'viewCreate'])->name('viewCreate');
        Route::post('store', [ViewController::class, 'viewStore'])->name('viewStore');
        Route::get('edit/{id}', [ViewController::class, 'viewEdit'])->name('viewEdit');
        Route::post('update', [ViewController::class, 'viewUpdate'])->name('viewUpdate');
        Route::get('delete/{id}', [ViewController::class, 'viewDelete'])->name('viewDelete');
    });
    // For Bed
    Route::prefix('bed')->group(function () {
        Route::get('/', [BedController::class, 'bedLists'])->name('bedLists');
        Route::get('create', [BedController::class, 'bedCreate'])->name('bedCreate');
        Route::post('store', [BedController::class, 'bedStore'])->name('bedStore');
        Route::get('edit/{id}', [BedController::class, 'bedEdit'])->name('bedEdit');
        Route::post('update', [BedController::class, 'bedUpdate'])->name('bedUpdate');
        Route::get('delete/{id}', [BedController::class, 'bedDelete'])->name('bedDelete');
    });
    // For Amenity
    Route::prefix('amenity')->group(function () {
        Route::get('/', [AmenityController::class, 'amenityLists'])->name('amenityLists');
        Route::get('create', [AmenityController::class, 'amenityCreate'])->name('amenityCreate');
        Route::post('store', [AmenityController::class, 'amenityStore'])->name('amenityStore');
        Route::get('edit/{id}', [AmenityController::class, 'amenityEdit'])->name('amenityEdit');
        Route::post('update', [AmenityController::class, 'amenityUpdate'])->name('amenityUpdate');
        Route::get('delete/{id}', [AmenityController::class, 'amenityDelete'])->name('amenityDelete');
    });

    // For Special Feature
    Route::prefix('special-feature')->group(function () {
        Route::get('/', [FeatureController::class, 'featureLists'])->name('featureLists');
        Route::get('create', [FeatureController::class, 'featureCreate'])->name('featureCreate');
        Route::post('store', [FeatureController::class, 'featureStore'])->name('featureStore');
        Route::get('edit/{id}', [FeatureController::class, 'featureEdit'])->name('featureEdit');
        Route::post('update', [FeatureController::class, 'featureUpdate'])->name('featureUpdate');
        Route::get('delete/{id}', [FeatureController::class, 'featureDelete'])->name('featureDelete');
    });

    Route::prefix('room')->group(function () {
        Route::get('/', [RoomController::class, 'roomLists'])->name('roomLists');
        Route::get('create', [RoomController::class, 'roomCreate'])->name('roomCreate');
        Route::post('store', [RoomController::class, 'roomStore'])->name('roomStore');
        Route::get('edit', [RoomController::class, 'roomEdit'])->name('roomEdit');
        Route::get('delete/{id}', [RoomController::class, 'roomDelete'])->name('roomDelete');
    });
});
