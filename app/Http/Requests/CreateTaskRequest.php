<?php

namespace App\Http\Requests;

class CreateTaskRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'user_id' => ['int', 'exists:users,id'],
            'completed' => ['bool']
        ];
    }
}
