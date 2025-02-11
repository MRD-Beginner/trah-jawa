<?php

use App\Http\Controllers\TreeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [TreeController::class, 'index'])->name('dashboard');

    Route::post('/trees/store', [TreeController::class, 'store'])->name('trees.store');
    
    Route::get('/trees/{id}/edit', [TreeController::class, 'edit'])->name('trees.edit');
    
    Route::delete('/trees/{id}/delete', [TreeController::class, 'delete'])->name('trees.delete');
    
    Route::put('/trees/{id}', [TreeController::class, 'update'])->name('trees.update');

    Route::get('/detail/{id}', [TreeController::class, 'detail'])->name('trees.show');
});


