<?php

use App\Domain\HttpCode;
use App\Http\Controllers\TaskController;
use App\Http\Responses\ApiErrorResponse;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

Route::get('login', function () {
    return new ApiErrorResponse(
        'User not authenticated.',
        HttpCode::UNAUTHORIZED
    );
})->name('login');

Route::group(['prefix' => 'api'], function () {

    Route::post('/authenticate', [LoginController::class, 'authenticate']);
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::middleware(['auth'])->group(function () {

        Route::get('/login/user', [LoginController::class, 'user']);

        Route::get('/tasks', [TaskController::class, 'all']);
        Route::get('/task/{id}', [TaskController::class, 'get']);
        Route::post('/task', [TaskController::class, 'create']);
        Route::put('/task/{id}', [TaskController::class, 'update']);
        Route::delete('/task/{id}', [TaskController::class, 'delete']);

        Route::post('/user/find-or-create', [UserController::class, 'findOrCreateUser']);
    });
});

Route::get('{any?}', function () {
    return view('app');
})->where('any', '.*');

