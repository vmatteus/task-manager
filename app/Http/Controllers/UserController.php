<?php

namespace App\Http\Controllers;

use App\Domain\HttpCode;
use App\Http\Requests\FindOrCreateRequest;
use App\Http\Resources\UserResource;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiResponse;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function findOrCreateUser(FindOrCreateRequest $request)
    {
        try {

            $data = $this->userService->findOrCreate($request->validated());

            return new ApiResponse(
                [
                    'user' => new UserResource($data['user']),
                ],
                $data['isNew'] ? HttpCode::CREATED : HttpCode::OK
            );
        } catch (\Throwable $exception) {
            Log::error($exception->getMessage());
            return new ApiErrorResponse;
        }
    }
}
