<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\LiteUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //

    public function login(LoginRequest $request)
    {
        if (!\Auth::attempt($request->only('password', 'login'), $request->remember)){
            $liteUser = LiteUser::where('login', $request->login)
                ->where('password', md5($request->password))
                ->first();
            if (is_null($liteUser)){
                return back()->withErrors(['errors', 'Неверный логин или пароль']);
            }

           $liteUser->user()->create([
                'login' => $liteUser->login,
                'email' => $liteUser->email,
                'password' => Hash::make($request->password)
            ]);

            \Auth::attempt($request->only('password', 'login'), $request->remember);
        }


        return  redirect()->intended();
    }

    public function logout()
    {
        \Auth::logout();

        return back();
    }
}
