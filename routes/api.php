<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProvidersController;
use App\Http\Controllers\Api\CategoriesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::group(['middleware' => ['web', 'auth:sanctum']], function () {
    Route::post('/providers/create', [ProvidersController::class, 'postCreate']);
    Route::post('/providers/edit/{id}', [ProvidersController::class, 'postEdit']);
    Route::post('/providers/delete/{id}', [ProvidersController::class, 'postDelete']);
    Route::get('/providers', [ProvidersController::class, 'getList']);
    Route::get('/categories', [CategoriesController::class, 'getList']);

  
    Route::post('/categories/create', [CategoriesController::class, 'postCreate']);
    Route::post('/categories/edit/{id}', [CategoriesController::class, 'postEdit']);
    Route::post('/categories/delete/{id}', [CategoriesController::class, 'postDelete']);
});


