<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Core\RabbitMQService;
use App\Services\dto\UserDto;
use App\Services\mapper\UserMapper;
use Illuminate\Support\Facades\Log;
use App\Jobs\SendUserData;

class UserService{

    private $userRepository; 
    private $rabbitMQService;

    public function __construct(UserRepository $userRepository,RabbitMQService $rabbitMQService){
        $this->userRepository = $userRepository;
        $this->rabbitMQService = $rabbitMQService;
    }

    public function create(UserDto $userDto){

        $userByEmail = $this->userRepository->findByEmail($userDto->email);

        if ($userByEmail) {
            $error = 'A user with this email already exists';
            Log::error('UserService', ['error' => $error]);
            abort(response()->json(['error' => $error], 400));
        }

        $user = UserMapper::mapToUser($userDto);
        $this->userRepository->save($user);

        $this->rabbitMQService->publish(json_encode($user));
        
        Log::info('UserService', ['saved user' => $user]);
        
        return $user;
    }
   
    public function getAll(){
        $users = $this->userRepository->findAll();
        return $users;
    }
}