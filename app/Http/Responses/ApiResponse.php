<?php

namespace App\Http\Responses;

use App\Domain\HttpCode;
use Illuminate\Http\JsonResponse;

/**
 * Default response for api
 */
class ApiResponse extends JsonResponse
{
    /**
     * ApiResponse constructor.
     * @param mixed $data
     * @param int $status
     */
    public function __construct($data = [], $status = HttpCode::OK)
    {
        $response = [
            "data" => $data,
        ];

        parent::__construct($response, $status);
    }
}
