<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (! $token = Auth::guard('api')->attempt($credentials)) {
            return response()->json([
                'message' => 'login details are incorrect'
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    public function register(RegistrationRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        response()->json([
            'message' => 'the user has successfully registered'
        ], 201);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
        ]);
    }
}
