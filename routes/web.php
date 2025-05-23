<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/', [TaskController::class, 'create'])->name('tasks.create');
Route::put('/{id}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/{id}', [TaskController::class, 'delete'])->name('tasks.delete');
