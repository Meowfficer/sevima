<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Modal Craete class 1
Route::get('modal-create', [DashboardController::class, 'createModal'])->name('create-modal');
Route::post('modal-store', [DashboardController::class, 'storeModal'])->name('store-modal');

// Modal Create Class 2
Route::get('modal-create-join', [DashboardController::class, 'createModalJoin'])->name('create-modal-join');
Route::post('modal-store-join', [DashboardController::class, 'storeModalJoin'])->name('store-modal-join');

Route::get('modal-create-student', [DashboardController::class, 'createModalStudent'])->name('create-modal-student');
Route::post('modal-store-student', [DashboardController::class, 'storeModalStudent'])->name('store-modal-student');

