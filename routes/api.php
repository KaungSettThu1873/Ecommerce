<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\BankController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login',[AuthController::class,'login']);

// Route::resource('/users',UserController::class);
Route::middleware(['auth:sanctum','check.role:Admin'])->group(function()
{
    Route::resource('/users',UserController::class);
    // Route::post('/user/create',[UserController::class,'create']);
    // Route::post('/user/update',[UserController::class,'update']);

    // Banks Start
    Route::get('/banks',[BankController::class,'index']);
    Route::post('/bank/create',[BankController::class,'create']);
    Route::post('/bank/update',[BankController::class,'update']);

    //Products Start


    //Carts Start
    // Route::get('/users/{$id}/cart/',[CartController::class,'index']);
});

Route::middleware(['auth:sanctum','check.role:User'])->group(function () {
    //  Route::resource('/users',UserController::class);
    Route::get('/products',[ProductController::class,'index']);
    Route::post('/product/create',[ProductController::class,'create']);
    Route::post('/product/update',[ProductController::class,'update']);
    Route::get('/product/delete/{id}',[ProductController::class,'delete']);
});

    Route::get('/users/cart/{id}',[CartController::class,'index']);









