<?php

namespace App\Http\Controllers;

use App\Domain\HttpCode;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiResponse;
use App\Services\Task\TaskService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
            return new ApiResponse([
                'tasks' => TaskResource::collection($this->taskService->all()),
            ]);
        } catch (\Throwable $exception) {
            Log::error($exception->getMessage());
            return new ApiErrorResponse();
        }
    }

    /**
     * @param int $id
     * @return ApiResponse|ApiErrorResponse
     */
    public function get(int $id): ApiResponse|ApiErrorResponse
    {
        try {
            return new ApiResponse([
                'task' => new TaskResource($this->taskService->get($id))
            ]);
        } catch (ModelNotFoundException $exception) {
            return new ApiErrorResponse('Task not found.', HttpCode::NOT_FOUND);
        } catch (\Throwable $exception) {
            Log::error($exception->getMessage());
            return new ApiErrorResponse;
        }
    }

    /**
     * @param Request $request
     * @return ApiResponse|ApiErrorResponse
     */
    public function create(CreateTaskRequest $request): ApiResponse|ApiErrorResponse
    {
        try {
            $task = $this->taskService->create($request->validated());
            return new ApiResponse([
                    'task' => [
                        'id' => $task->id
                    ]
                ],
                HttpCode::CREATED
            );
        } catch (\Throwable $exception) {
            Log::error($exception->getMessage());
            return new ApiErrorResponse;
        }
    }

    /**
     * @param int $id
     * @param Request $request
     * @return ApiResponse|ApiErrorResponse
     */
    public function update(int $id, UpdateTaskRequest $request): ApiResponse|ApiErrorResponse
    {
        try {
            $this->taskService->update($id, $request->validated());
            return new ApiResponse([
                    'task' => [
                        'id' => $id
                    ]
                ],
                HttpCode::OK
            );
        } catch (ModelNotFoundException $exception) {
            return new ApiErrorResponse('Task not found.', HttpCode::NOT_FOUND);
        } catch (\Throwable $exception) {
            Log::error($exception->getMessage());
            return new ApiErrorResponse;
        }
    }

    /**
     * @param int $id
     * @return ApiResponse|ApiErrorResponse
     */
    public function delete(int $id): ApiResponse|ApiErrorResponse
    {
        try {
            $this->taskService->delete($id);
            return new ApiResponse(
                [
                    'message' => 'Task deleted successfully'
                ],
                HttpCode::OK
            );
        } catch (ModelNotFoundException $exception) {
            return new ApiErrorResponse('Task not found.', HttpCode::NOT_FOUND);
        } catch (\Throwable $exception) {
            Log::error($exception->getMessage());
            return new ApiErrorResponse;
        }
    }
}
