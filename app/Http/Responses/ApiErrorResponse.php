<?php

namespace App\Http\Responses;

use App\Domain\HttpCode;
use Illuminate\Http\JsonResponse;

/**
 * Error response for api
 */
class ApiErrorResponse extends JsonResponse
{
    /**
     * ApiErrorResponse constructor.
     * @param mixed $data
     * @param int $status
     */
    public function __construct($message = 'Whoops something wrong...', $status = HttpCode::INTERNAL_SERVER_ERROR)
    {
        $response = [
            "message" => $message,
        ];

        parent::__construct($response, $status);
    }
}
