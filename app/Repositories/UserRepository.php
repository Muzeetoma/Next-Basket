<?php

namespace App\Repositories;
use App\Models\User;

class UserRepository{

    public function save(User $user){
       return $user->save();
    }

    public function findByEmail($email){
        return User::where('email', $email)->first();
    }

    public function findAll(){
        return User::all();
    }
}