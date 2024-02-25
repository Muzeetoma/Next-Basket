<?php

namespace Tests\Unit;

use App\Services\UserService;
use App\Repositories\UserRepository;
use App\Core\RabbitMQService;
use App\Services\dto\UserDto;
use Illuminate\Support\Facades\Log;
use Mockery\MockInterface;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    public function test_create_method()
    {
        $userRepositoryMock = $this->mock(UserRepository::class);
        $rabbitMQServiceMock = $this->mock(RabbitMQService::class);

        $userRepositoryMock->shouldReceive('findByEmail')->andReturn(null);
        $userRepositoryMock->shouldReceive('save')->once();

        $rabbitMQServiceMock->shouldReceive('publish')->once();

        $userService = new UserService($userRepositoryMock, $rabbitMQServiceMock);

        $userDto = new UserDto("user@example.com","user", "user");

        $createdUser = $userService->create($userDto);

        $this->assertEquals($createdUser->email, $userDto->email);
        $this->assertEquals($createdUser->lastName, $userDto->lastName);
        $this->assertEquals($createdUser->firstName, $userDto->firstName);
    }
}

