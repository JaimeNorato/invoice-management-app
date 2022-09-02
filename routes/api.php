<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::apiResource('v1/invoices', App\Http\Controllers\Api\V1\InvoiceController::class);
Route::apiResource('v1/invoice/details', App\Http\Controllers\Api\V1\InvoiceDetailController::class);
Route::apiResource('v1/receivers', App\Http\Controllers\Api\V1\ReceiverController::class)->only(['index', 'store', 'update']);
Route::apiResource('v1/issuers', App\Http\Controllers\Api\V1\IssuerController::class)->only(['index', 'store', 'update']);
