<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;


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

Route::get('', [TestController::class, 'viewCreate'])->name('createForm');
Route::post('', [TestController::class, 'ViewStore'])->name('viewCreate');
Route::get('views', [TestController::class, 'viewIndex'])->name('viewIndex');
Route::get('view/edit/{id}', [TestController::class, 'viewEdit'])->name('viewEdit');
Route::post('view/update', [TestController::class, 'viewUpdate'])->name('viewUpdate');
Route::get('view/delete/{id}', [TestController::class, 'viewDelete'])->name('viewDelete');