<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\RegistrationFormRequest;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(Request $request)
    {
        $user = $this->userRepository->logout($request);

        return response()->json([
            'success' => true,

            'user' => $user
        ]);
    }


    public function logout(Request $request)
    {
        $user = $this->userRepository->logout($request);
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);

    }

    /**
     * @param RegistrationFormRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegistrationFormRequest $request)
    {
        $user = $this->userRepository->register($request);

        return response()->json([
            'success'   =>  true,
            'data'      =>  $user
        ], 200);
    }
    public function getAllUsers()
    {
        $users = $this->userRepository->getAllUsers();
        return response($users, 200);
    }
    public function  delete($id)
    {
       $user= $this->userRepository->getUserById($id);
       $this->userRepository->delete($user);
        return response()->json([

            "message" => "User deleted"
        ], 201);
    }

}
