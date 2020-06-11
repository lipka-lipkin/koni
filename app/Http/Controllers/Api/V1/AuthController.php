<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\AuthRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Resources\Api\UserResource;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->token = $user->createToken('authToken')->accessToken;
        return UserResource::make($user);
    }

    public function auth(AuthRequest $request)
    {
        $user = auth()->user();
        return UserResource::make($user);
    }
}
