<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user',function(Request $request){
    return $request->user;
});

Route::resource('/product', ProductController::class);

Route::prefix('/product')->group(function () {
    Route::resource('{product}/reviews', ReviewController::class);
});
