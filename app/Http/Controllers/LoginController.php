<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $role_id = $user->role_id;

            if ($role_id == 1) {
                // Redirect to user page
                return redirect()->route('ali');
            } elseif ($role_id == 2) {
                // Redirect to admin dashboard
                return redirect()->route('admin');
            }
        }

        // If the authentication attempt fails, redirect back with an error message
        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Clear the user_id and user_name session data
        $request->session()->forget('user_id');
        $request->session()->forget('user_name');

        return redirect()->route('ali');
    }
}
