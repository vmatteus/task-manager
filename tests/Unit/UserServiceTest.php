<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    protected $userService;
    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->userService = app(UserService::class);
        $this->user = User::factory()->make();
        $this->user->save();
    }

    public function test_create_method(): void
    {
        $newUser = [
            'name' => 'test',
            'email' => 'teste@teste.com',
            'password' => Hash::make('123456'),
        ];
        $userInserted = $this->userService->create($newUser);
        $this->assertEquals($newUser['name'], $userInserted->name);
        $this->assertEquals($newUser['email'], $userInserted->email);
    }

    public function test_find_or_create_method_create(): void
    {
        $user = [
            'name' => 'testenew',
            'email' => 'testeNew@gmail.com',
        ];
        $userCreated = $this->userService->findOrCreate($user);
        $this->assertEquals($user['name'], $userCreated['user']->name);
        $this->assertEquals($user['email'], $userCreated['user']->email);
        $this->assertTrue($userCreated['isNew']);
    }

    public function test_find_or_create_method_find(): void
    {
        $user = [
            'name' => $this->user->name,
            'email' => $this->user->email,
        ];
        $userFind = $this->userService->findOrCreate($user);
        $this->assertEquals($user['name'], $userFind['user']->name);
        $this->assertEquals($user['email'], $userFind['user']->email);
        $this->assertFalse($userFind['isNew']);
    }

}
