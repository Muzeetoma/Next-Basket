<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\dto\UserDto;
use App\Core\ValidatorService;


class UserController extends Controller
{

    private $userService;
    private $validatorService;

    public function __construct(UserService $userService, ValidatorService $validatorService){
        $this->userService = $userService;
        $this->validatorService = $validatorService;
    }

    public function create(Request $request){

        $rules = [
            'email' => 'required|email',
            'lastName' => 'required|string',
            'firstName' => 'required|string',
        ];
       
        $errors = $this->validatorService->validateRequest($request->all(), $rules);

        if ($errors) {
            return response()->json(['validation_errors' => $errors], 400);
        }

        $userDto = new UserDto($request->email,$request->firstName,$request->lastName);

        $user = $this->userService->create($userDto);

        

        return response()->json(['message' => 'User created successfully'], 201);
    }

    public function getAll(){
        $allUsers = $this->userService->getAll();
        return response()->json(['users' => $allUsers], 200);
    }
}
