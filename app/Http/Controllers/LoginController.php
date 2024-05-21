<?php

namespace App\Http\Controllers;

use App\Domain\HttpCode;
use App\Http\Requests\AuthenticateRequest;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiResponse;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Authenticate the user.
     * @param AuthenticateRequest $request
     * @return ApiResponse|ApiErrorResponse
     */
    public function authenticate(AuthenticateRequest $request): ApiResponse|ApiErrorResponse
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return new ApiResponse(
                [
                    'user' => new UserResource(Auth::user())
                ],
            );
        }

        return new ApiErrorResponse(
            'The provided credentials do not match our records.',
            HttpCode::UNAUTHORIZED
        );
    }

    /**
     * Log the user out of the application.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request): ApiResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return new ApiResponse([
            'message' =>'Logged out'
        ]);
    }

    /**
     * Get the authenticated User.
     * @return ApiResponse
     */
    public function user(): ApiResponse
    {
        return new ApiResponse(
            [
                'user' => new UserResource(Auth::user())
            ],
        );
    }
}
