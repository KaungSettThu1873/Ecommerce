<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BankController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function() {
    // Route::get('/users',[UserController::class,'index']);
});
    Route::get('/users',[UserController::class,'index']);
    Route::post('/user/create',[UserController::class,'create']);
    Route::post('/user/update',[UserController::class,'update']);


// Banks Start
    Route::get('/banks',[BankController::class,'index']);
    Route::post('/bank/create',[BankController::class,'create']);
    Route::post('/bank/update',[BankController::class,'update']);

//Products Start
    Route::get('/products',[ProductController::class,'index']);
    Route::post('/product/create',[ProductController::class,'create']);
    Route::post('/product/update',[ProductController::class,'update']);
    Route::get('/product/delete/{id}',[ProductController::class,'delete']);


Route::post('/login',[AuthController::class,'login']);
