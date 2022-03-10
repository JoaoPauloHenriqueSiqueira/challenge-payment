<?php

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

Route::group(
    ['middleware' => ['auth:sanctum']],
    function () {
        Route::post('/logout', [App\Http\Controllers\Auth\UserAuthController::class, 'logout']);

        Route::group(['prefix' => 'profile'], function () {
            Route::put('/', [App\Http\Controllers\UserController::class, 'update']);
        });
        Route::apiResource('/users', App\Http\Controllers\UserController::class, [
            'only' => ['index', 'show', 'destroy']
        ]);

        Route::apiResource('/wallets', App\Http\Controllers\WalletController::class, [
            'only' => ['index']
        ]);

        Route::group(['prefix' => 'deposit'], function () {
            Route::post('/', [App\Http\Controllers\WalletController::class, 'deposit']);
        });

        Route::group(['prefix' => 'pay'], function () {
            Route::post('/', [App\Http\Controllers\TransactionController::class, 'pay']);
        });
    }
);

Route::post('/register', [App\Http\Controllers\Auth\UserAuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\Auth\UserAuthController::class, 'login']);