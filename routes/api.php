<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    CategoryController
};

Route::apiResource('categories',  CategoryController::class);

Route::get('/', function() {
    return response()->json(['message' => 'success']);
});