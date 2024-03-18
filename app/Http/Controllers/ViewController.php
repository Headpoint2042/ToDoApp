<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ViewController extends Controller
{

    public function view(Request $request) {
        // Check if the user is logged in
        $user = Auth::user();

        // Serialize user data to JSON
        $userData = json_encode($user);

        // Return the view with user data or null user
        return view('login', ['user' => $userData]);
    }
}
