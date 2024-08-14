<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\Todo2Controller;
use Illuminate\Support\Facades\Route;

Route::get('/hi', function () {
    return view('welcome');
});

Route::get('/helloword', [Todo2Controller::class, 'index']);

Route::get('/todo', [TodoController::class, 'index'])->name('todo');
Route::post('/todo', [TodoController::class, 'store'])->name('todo.post');
Route::put('/todo/{id}', [TodoController::class, 'update'])->name('todo.update');
Route::delete('/todo/{id}', [TodoController::class, 'destroy'])->name('todo.delete');
