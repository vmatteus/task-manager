<?php

namespace Tests\Feature;

use App\Domain\HttpCode;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create([
            'email' => 'testefind@gmail.com'
        ]);
    }

    public function test_create_a_task_new(): void
    {
        $response = $this->post('/api/user/find-or-create', [
            'name' => 'teste',
            'email' => 'teste@teste.com',
        ]);
        $response->assertStatus(httpCode::CREATED);
    }

    public function test_create_a_task_find(): void
    {
        $response = $this->post('/api/user/find-or-create', [
            'name' => $this->user->name,
            'email' => $this->user->email,
        ]);
        $response->assertStatus(httpCode::OK);
    }

}
