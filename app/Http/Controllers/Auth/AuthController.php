<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showFormRegister() {
        return view('auth.register');
    }

    public function register(UserRegisterRequest $request): \Illuminate\Http\RedirectResponse {
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

    public function login(Request $request) {
        try {
            $data = $request->only(['email', 'password']);

            if (Auth::guard('web')->attempt($data)) {
                return redirect()->route('home');
            }

            return redirect()->route('show-form-login')->withErrors(['error' => 'Email hoac mat khau khong chinh xac']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->withErrors(['server_error' => $exception->getMessage()]);
        }
    }

    public function logout(): \Illuminate\Http\RedirectResponse {
        try {
            Auth::guard('web')->logout();

            return redirect()->route('show-form-login');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->withErrors(['server_error' => $exception->getMessage()]);
        }
    }
}
