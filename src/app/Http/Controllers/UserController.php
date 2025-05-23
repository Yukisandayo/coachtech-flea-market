<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function storeUser(RegisterRequest $request){
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        Auth::login($user);
        return redirect('/initial/mypage/profile');
    }

    public function loginUser(LoginRequest $request){
        $credentials=$request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'login_error' => 'ログイン情報が登録されていません',
            ]);
        }
        return redirect('/');
    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('auth.login');
    }
}
