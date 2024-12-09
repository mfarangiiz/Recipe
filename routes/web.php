<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('about', function () {
    return view('about');
})->name('about');

Route::get('createRecipe', function () {
    return view('createRecipe');
})->name('createRecipe');

Route::get('frontRegister', function () {
    return view('frontRegister');
})->name('frontRegister');

Route::middleware('auth')->group(function () {
// Profile-related routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin-only routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [Controller::class, 'index'])->name('dashboard');
    Route::get('admin/manager/create', [Controller::class, 'createManager'])->name('admin.manager.create');
    Route::post('admin/manager/store', [Controller::class, 'storeManager'])->name('manager.store');
    Route::get('admin/manager/delete/{id}', [Controller::class, 'deleteManager'])->name('manager.delete');
    Route::get('admin/manager/edit/{id}', [Controller::class, 'editManager'])->name('manager.edit');
    Route::put('admin/manager/update/{id}', [Controller::class, 'updateManager'])->name('manager.update');
});

Route::resource('recipes', RecipeController::class);

// Admin and Manager routes
Route::middleware(['auth', 'role:admin|manager'])->group(function () {
    Route::get('admin/recipes', [Controller::class, 'recipe'])->name('admin.recipes');
    Route::get('admin/recipes/create', [Controller::class, 'create'])->name('admin.recipes.create');
});

require __DIR__ . '/auth.php';
