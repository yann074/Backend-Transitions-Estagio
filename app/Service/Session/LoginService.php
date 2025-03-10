<?php

namespace App\Service\Session;

use Illuminate\Contracts\Validation\Factory as Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Service\ApiResponse;
 
class LoginService
{
    private $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function validateLogin($data)
    {
        return $this->validator->make($data, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }

    public function attemptLogin($loginInfo)
    {
        $validator = $this->validateLogin($loginInfo);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        if (Auth::attempt($loginInfo)) {
            $user = Auth::user();
            $token = $user->createToken($user->name)->plainTextToken;
            return ApiResponse::success(['token' => $token]);
        }

        return ApiResponse::unauthorized("Dados de login incorretos.");
    }
}
