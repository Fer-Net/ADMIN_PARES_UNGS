<?php
use App\Http\Controllers\Statical\ProfileController;
use App\Http\Controllers\Statical\ProviderController;
use App\Http\Controllers\Statical\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('providers.index'); // Redirige a la ruta de proveedores
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

    Route::get('/category', [CategoriesController::class, 'getIndex'])->name('category.index');
    Route::get('/category/create', [CategoriesController::class, 'getCreate'])->name('category.create');
    Route::get('/category/edit/{id}', [CategoriesController::class, 'getEdit'])->name('category.edit');
    Route::post('/category/delete', [CategoriesController::class, 'postDelete'])->name('category.delete');
});

require __DIR__.'/auth.php';
