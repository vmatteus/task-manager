<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
})->name('application');

Route::get('/tasks', [TaskController::class, 'all']);
