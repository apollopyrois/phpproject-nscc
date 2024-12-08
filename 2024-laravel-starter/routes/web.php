<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::resource('categories', CategoryController::class);

Route::get('/items/create', [ItemController::class, 'create']);
Route::post('/items', [ItemController::class, 'store']);

Route::get('/items', [ItemController::class, 'index']);

Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');
Route::patch('/items/{id}', [ItemController::class, 'update'])->name('items.update');
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
