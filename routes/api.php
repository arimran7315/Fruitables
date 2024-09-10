<?php

use App\Http\Controllers\api\orderController;
use App\Http\Controllers\api\readCartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::apiResource('orders',orderController::class);
Route::get('readCart/{id}', [readCartController::class,'readCart']);