<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showFormLogin(){
        return view('admin.auth.login');
    }

    public function login(Request $request){
        try {
            $data = $request->only(['email', 'password']);

            if (Auth::guard('admin')->attempt($data)) {
                return redirect()->route('admin.home');
            }

            return redirect()->route('admin.show-form-login')->withErrors(['error' => 'Email hoac mat khau khong chinh xac']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->withErrors(['server_error' => $exception->getMessage()]);
        }
    }

}
