<?php

namespace App\Http\Controllers\Api\V1\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\auth\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function __invoke(AuthRequest $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){
            $user = $request->user();

            // Deleting existing token
            $user->tokens()->delete();

            // Generating new token
            $newToken = $user->createToken('token')->plainTextToken;
            return response()->json([
                'token' => $newToken
            ],201);
        }

    }
}
