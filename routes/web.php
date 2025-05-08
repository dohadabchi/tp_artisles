<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('register');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Article routes
    Route::get('/articles', [UserController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [UserController::class, 'create'])->name('articles.create');
    Route::post('/articles', [UserController::class, 'store'])->name('articles.store');
    Route::get('/articles/{id}', [UserController::class, 'details'])->name('articles.details');
    Route::get('/articles/{id}/edit', [UserController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{id}', [UserController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{id}', [UserController::class, 'destroy'])->name('articles.destroy');
    Route::get('/articles/{id}/comment', [UserController::class, 'comment'])->name('articles.createcomment');
    Route::post('/articles/{id}/comment', [UserController::class, 'storeComment'])->name('articles.storecomment');
});

require __DIR__.'/auth.php';