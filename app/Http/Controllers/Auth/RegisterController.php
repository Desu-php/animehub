<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\LiteUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();

            $liteUser = LiteUser::create([
                'ip' => $request->ip(),
                'img' => asset('images/default_avatar.png')
            ]);

            $liteUser->user()->create([
                'login' => $request->login,
                'password' => Hash::make($request->password),
                'email' => $request->email,
            ]);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors(['errors', 'IP адрес не получен']);
        }


        \Auth::attempt(['login' => $request->login, 'password' => $request->password]);

        return redirect()->route('home');
    }
}
