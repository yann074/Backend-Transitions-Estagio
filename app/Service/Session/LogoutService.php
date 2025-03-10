<?php

namespace App\Service\Session;

use App\Service\ApiResponse;
use Illuminate\Contracts\Auth\Factory as Auth;

class LogoutService
{
    private $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function logoutResponse()
    {
        $user = $this->auth->user(); 

        if (!$user) {
            return ApiResponse::error("Usuário não autenticado");
        }
        $user->tokens()->delete(); 

        return ApiResponse::success("Logout realizado com sucesso");
    }
}
