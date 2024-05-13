<?php

namespace App\Http\Controllers;

use App\Domain\HttpCode;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiResponse;
use App\Models\Task;
use App\Services\Task\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    /**
     * @var TaskService
     */
    protected TaskService $taskService;

    /**
     * @param TaskService $taskService
     */
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * @return ApiResponse|ApiErrorResponse
     */
    public function all(): ApiResponse|ApiErrorResponse
    {
        try {
            return new ApiResponse(
                $this->taskService->all(),
            );
        } catch (\Exception $exception) {
            return new ApiErrorResponse();
        }
    }

    /**
     * @param Request $request
     * @return ApiResponse|ApiErrorResponse
     */
    public function create(Request $request): ApiResponse|ApiErrorResponse
    {
        try {
            return new ApiResponse(
                [],
                HttpCode::CREATED
            );
        } catch (\Exception $exception) {
            return new ApiErrorResponse();
        }
    }

    /**
     * @param int $id
     * @param Request $request
     * @return ApiResponse|ApiErrorResponse
     */
    public function update(int $id, Request $request): ApiResponse|ApiErrorResponse
    {
        try {
            return new ApiResponse(
                $this->taskService->all(),
            );
        } catch (\Exception $exception) {
            return new ApiErrorResponse();
        }
    }

    /**
     * @param int $id
     * @return ApiResponse|ApiErrorResponse
     */
    public function delete(int $id): ApiResponse|ApiErrorResponse
    {
        try {
            return new ApiResponse(
                $this->taskService->all(),
            );
        } catch (\Exception $exception) {
            return new ApiErrorResponse();
        }
    }
}
