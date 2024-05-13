<?php

namespace App\Http\Requests;

use App\Domain\HttpCode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

/**
 * BaseRequest for FormRequests
 */
class BaseRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @param Validator $validator
     * @return mixed
     */
    protected function failedValidation(Validator $validator): HttpResponseException
    {
        $exception = new ValidationException($validator);
        throw new HttpResponseException(
            response()->json(
                [
                    'errors' => [
                        'message' => $validator->getMessageBag()->toArray()
                    ]
                ],
                HttpCode::getValidCode($exception->getCode(), HttpCode::UNPROCESSABLE_ENTITY)
            )
        );
    }
}
