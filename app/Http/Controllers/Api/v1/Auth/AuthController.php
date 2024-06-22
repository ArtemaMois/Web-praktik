<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginUserRequest;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        if(auth()->attempt([
            'login' => $request->input('login'),
            'password' => $request->input('password')
        ])){
            return response()->json(['status' => 'success']);
        };
        return response()->json(['status' => 'failed', 'message' => "Неверный логин или пароль"]);
    }

    public function logout(Request $request)
    {
//        dd(auth()->user());
        auth()->guard('web')->logout();
        return response()->json(['status' => 'success']);
    }
}
