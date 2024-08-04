<?php

use App\Http\Controllers\Statical\ProfileController;
use App\Http\Controllers\Statical\ProviderController;
use App\Http\Controllers\Statical\CategoryController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/provider', [ProviderController::class, 'getIndex'])->name('providers.index');
    Route::get('/provider/create', [ProviderController::class, 'getCreate'])->name('providers.create');
    Route::get('/provider/edit/{id}', [ProviderController::class, 'getEdit'])->name('providers.edit');
    Route::post('/provider/delete', [ProviderController::class, 'postDelete'])->name('providers.delete');

    Route::get('/category',[CategoryController::class, 'getIndex'])->name('category.index');
});

require __DIR__.'/auth.php';
