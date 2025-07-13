<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('projects.index');
});
Route::view('/about', 'about')->name('about');
Route::resource('projects', ProjectController::class);
Route::resource('projects.tasks', TaskController::class)->shallow();
Route::patch('/tasks/{task}/toggle-complete', [TaskController::class, 'toggleComplete'])->name('tasks.toggleComplete');
