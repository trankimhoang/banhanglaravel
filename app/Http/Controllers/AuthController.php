<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showFormRegister(){
        return view('auth.register');
    }

    public function register(UserRegisterRequest $request){
        try {
            $user = new User();
            $user->setAttribute('name', $request->get('name'));
            $user->setAttribute('email', $request->get('email'));
            $user->setAttribute('password', Hash::make($request->get('password')));
            $user->save();

            return redirect()->route('show-form-register')->with('success', 'dang ky thanh cong');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->withErrors(['server_error' => $exception->getMessage()]);
        }
    }

    public function showFormLogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('home');
        }

        return redirect()->route('show-form-login')->with('error', 'Email hoac mat khau khong chinh xac');
    }

    public function logout(){
        Auth::guard('web')->logout();

        return redirect()->route('login');
    }

}
