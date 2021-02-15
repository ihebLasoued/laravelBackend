<?php

namespace  App\Repository;


use App\User;
use Illuminate\Http\Request;

class UserRepository
{
    public function getAllUsers()
    {
        $users = User::get();
        return $users;
    }
    public function  delete($user_id)
    {
        $user = User::find($user_id);

        $user->delete();

    }
    public function getUserById($user_id)
    {
        $user = User::find($user_id);
        return $user;
    }
}
