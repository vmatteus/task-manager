<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
})->name('application');

Route::group(['prefix' => 'api'], function () {
    Route::get('/tasks', [TaskController::class, 'all']);
    Route::get('/task/{id}', [TaskController::class, 'get']);
    Route::post('/task', [TaskController::class, 'create']);
    Route::put('/task/{id}', [TaskController::class, 'update']);
    Route::delete('/task/{id}', [TaskController::class, 'delete']);
});

