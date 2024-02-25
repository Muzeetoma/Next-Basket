<?php 

namespace App\Services\mapper;

use App\Models\User;
use App\Services\dto\UserDto;

class UserMapper{

    public static function mapToUser(UserDto $userDto){
        $user = new User();
        $user->email=$userDto->email;
        $user->firstName=$userDto->firstName;
        $user->lastName=$userDto->lastName; 
        return $user;
    }

    public static function mapToUserDto(User $user){
        return new UserDto([
            'email' => $user->email,
            'firstName' => $user->firstName,
            'lastName' => $user->lastName,
        ]);
    }
}