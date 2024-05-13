<?php

namespace App\Services\User;

use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService
 */
class UserService extends BaseService
{
    /**
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @param array $data
     * @return User
     */
    public function create(array $data): User
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function findOrCreate(array $data): array
    {
        $user = $this->model->where('email', $data['email'])->first();

        if ($user) {
            return [
                'user' => $user,
                'isNew' => false
            ];
        }

        $data['password'] = Hash::make('password');
        return [
            'user' => $this->create($data),
            'isNew' => true
        ];
    }
}
