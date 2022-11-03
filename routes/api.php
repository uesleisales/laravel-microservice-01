<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    CategoryController,
    CompanyController
};

Route::apiResource('categories',  CategoryController::class);
Route::apiResource('companies',  CompanyController::class);

Route::get('/', function() {
    return response()->json(['message' => 'success']);
});