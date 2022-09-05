<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['middleware' => 'api','prefix'=> 'v1'], function($router){
    ///Auth
    Route::group(['prefix' => 'auth'], function ($router) {
        Route::post('login', [App\Http\Controllers\Api\V1\AuthController::class,"login"]);
        Route::post('logout', [App\Http\Controllers\Api\V1\AuthController::class,"logout"]);
        Route::post('refresh', [App\Http\Controllers\Api\V1\AuthController::class,"refresh"]);
        Route::post('me', [App\Http\Controllers\Api\V1\AuthController::class,"me"]);
        Route::post('register', [App\Http\Controllers\Api\V1\AuthController::class,"register"]);
    });

    Route::apiResource('invoices', App\Http\Controllers\Api\V1\InvoiceController::class);
    Route::apiResource('invoice/details', App\Http\Controllers\Api\V1\InvoiceDetailController::class);
    Route::apiResource('receivers', App\Http\Controllers\Api\V1\ReceiverController::class)->only(['index', 'store', 'update']);
    Route::apiResource('issuers', App\Http\Controllers\Api\V1\IssuerController::class)->only(['index', 'store', 'update']);
});

