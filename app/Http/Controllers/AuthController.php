<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Service\Session\LoginService;
use App\Service\Session\LogoutService;
use Illuminate\Http\Request;
use App\Service\ApiResponse;

class AuthController extends Controller
{
    private $loginService;
    private $logoutService;

    public function __construct(LoginService $loginService, LogoutService $logoutService)
    {
        $this->loginService = $loginService;
        $this->logoutService = $logoutService;
    }

    public function Login(LoginRequest $request)
    {
        try {
            $loginInfo = $request->only('email', 'password');

            return $this->loginService->attemptLogin($loginInfo);
        } catch (\Exception $e) {

            return ApiResponse::error($e->getMessage());
        }
    }

    public function Logout(Request $request){
        try{
        return $this->logoutService->logoutResponse();
        }catch (\Exception $e) {

            return ApiResponse::error($e->getMessage());
        }
    }
}
