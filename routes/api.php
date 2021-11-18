<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('product', ProductController::class);

Route::prefix('product')->group(function () {
    Route::resource('/{product}/review', ReviewController::class);
});
