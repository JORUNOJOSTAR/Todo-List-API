<?php

namespace App\Http\Controllers\Api\V1\auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\V1\auth\AuthRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(AuthRequest $request){

        if(User::where('email',$request->email)->first()){
            return response()->json([
                'message' => "User already existed."
            ],400);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'token' => $user->createToken('token',['*'],now()->addWeek())->plainTextToken
        ],201);
    }
}
