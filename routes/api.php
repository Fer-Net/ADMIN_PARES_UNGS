<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProvidersController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/providers', [ProvidersController::class, 'getList']);

Route::group(['middleware' => ['web', 'auth:sanctum']], function () {
    Route::post('/providers/create', [ProvidersController::class, 'postCreate']);
    Route::post('/providers/edit/{id}', [ProvidersController::class, 'postEdit']);
});

