<?php

namespace App\Http\Requests;

class UpdateTaskRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['string', 'max:255'],
            'description' => ['string'],
            'user_id' => ['int', 'exists:users,id'],
            'completed' => ['bool']
        ];
    }
}
