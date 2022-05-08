<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User\LiteUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('password', 'login'), $request->remember)) {

            $liteUser = LiteUser::where('login', $request->login)
                ->where('password', md5($request->password))
                ->first();

            if (is_null($liteUser)) {
                return response()->json([
                    'message' => 'Неверный логин или пароль'
                ], 400);
            }

             $liteUser->user()->create([
                'login' => $liteUser->login,
                'email' => $liteUser->email,
                'password' => Hash::make($request->password)
            ]);

            Auth::attempt($request->only('password', 'login'), $request->remember);
        }


        return response()->json(Auth::user());
    }

    public function logout()
    {
        Auth::logout();

        return back();
    }
}
