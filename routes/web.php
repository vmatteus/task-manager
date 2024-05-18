<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;

Route::group(['prefix' => 'api'], function () {
    // Task
    Route::get('/tasks', [TaskController::class, 'all']);
    Route::get('/task/{id}', [TaskController::class, 'get']);
    Route::post('/task', [TaskController::class, 'create']);
    Route::put('/task/{id}', [TaskController::class, 'update']);
    Route::delete('/task/{id}', [TaskController::class, 'delete']);

    // User
    Route::post('/user/find-or-create', [UserController::class, 'findOrCreateUser']);
});

Route::get('{any?}', function () {
    return view('app');
})->where('any', '.*');

