<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('projects.index');
});
Route::view('/about', 'about')->name('about');
Route::resource('projects', ProjectController::class);
