<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $input = $request->only('email', 'password');

        $user= Admin::where('email', $request['email'])->first();



        return response()->json([
            'success' => true,

            'user'=>$user
        ]);
    }
}
