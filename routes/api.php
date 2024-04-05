<?php

use App\Http\Controllers\AddonController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\SmsGatewayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Authentication
Route::post('/admin/login', [ApiAuthController::class, 'login']);

Route::post('/admin/logout', [ApiAuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {

    // Restaurant CRUD
    Route::get('/restaurants', [RestaurantController::class, 'index']);
    Route::get('/restaurants/{id}', [RestaurantController::class, 'show']);
    Route::post('/restaurants', [RestaurantController::class, 'store']);
    Route::post('/restaurants/{id}/update', [RestaurantController::class, 'update']);
    Route::delete('/restaurants/{id}', [RestaurantController::class, 'destroy']);


    // Items CRUD
    Route::get('/items', [ItemController::class, 'index']);
    Route::get('/items/{id}', [ItemController::class, 'show']);
    Route::post('/items/{id}/update', [ItemController::class, 'update']);
    Route::delete('/items/{id}', [ItemController::class, 'destroy']);

    // Addons CRUD
    Route::get('/addons', [AddonController::class, 'index']);
    Route::get('/addons/{id}', [AddonController::class, 'show']);
    Route::post('/addons/{id}/update', [AddonController::class, 'update']);
    Route::delete('/addons/{id}', [AddonController::class, 'destroy']);
});
