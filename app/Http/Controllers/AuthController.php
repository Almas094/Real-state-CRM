<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login_id' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('login_id', $request->input('login_id'))->first();
        if ($user) {
            if (Hash::check($request->input('password'), $user->password)) {
                Auth::login($user);
                $request->session()->regenerate();
                return redirect()->intended(route('dashboard'));
            }

            return back()->withErrors([
                'password' => 'The provided password does not match.',
            ])->onlyInput('password');
        }

        return back()->withErrors([
            'login_id' => 'The provided login ID does not match.',
        ])->onlyInput('login_id');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
      
        $status = Password::sendResetLink($request->only('email'));

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', 'We have e-mailed your password reset link!')
            : back()->withErrors(['email' => 'Unable to send password reset link']);
    }

    public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
            'token' => 'required',
        ], [
            'password.confirmed' => 'Password and confirm password do not match.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->password = Hash::make($request->password);
                $user->remember_password = $request->password;
                $user->save();
            }
        );

        return $status == Password::PASSWORD_RESET
        ? response()->json(['status' => true, 'message' => 'Your password has been reset!'], 200)
        : response()->json(['status' => false, 'message' => 'There was an error resetting your password'], 500);
    }
}
