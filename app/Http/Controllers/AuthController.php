<?php

namespace App\Http\Controllers;

use App\Service\ApiResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function Login(Request $request){
        $email = $request->email;
        $password = $request->password;

        $authentication = auth()->attempt([
            'email' => $email,
            'password' => $password
        ]);
        if(!$authentication){
            return ApiResponse::error('Algo deu errado, tente novamente');
        }
        $user = auth()->user();
        if(!$user){
            return ApiResponse::error('Login não foi feito');
        }
        $token = $user->createToken($user->name)->plainTextToken;

        return ApiResponse::success(['message' => 'User Loged','token' => $token]);
    }

}

