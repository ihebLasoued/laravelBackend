<?php

namespace  App\Repository;


use App\User;
use Illuminate\Http\Request;
class UserRepository{
    public function getAllUsers() {
        $users = User::get();
        return response($users, 200);
    }
    public function  delete (Request $request)
    {
        $user=User::find($request->get('id'));

        $user->delete();
        return response()->json([

            "message" => "User deleted"
        ], 201);
    }
}
