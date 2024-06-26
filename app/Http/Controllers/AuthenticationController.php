<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password field is required.',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                'user' => Auth::user()->email,
                'redirect' => '/dashboard'
            ]);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique:users' => 'The email is already registered',
            'password.required' => 'The password field is required.',
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Hash the password
        $user->save();

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            return response()->json([
                'user' => Auth::user()->email,
                'redirect' => '/dashboard'
            ]);
        }
        // Return a response indicating unsuccessful registration
        return response()->json(['message' => 'User registration failed'], 422);
    }

    public function logout(Request $request)
{
    $request->user()->tokens()->delete(); // Revoke all tokens for the authenticated user

    // Optionally, clear any session data
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return response()->json(['message' => 'Logged out successfully']);
}

}
