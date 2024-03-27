<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ViewController extends Controller
{

    public function view(Request $request) {
        // Check if the user is logged in
        $user = Auth::user();

        if ($user == null) {
            $userData = null;
        } else {
            $userData = $user->email;
        }


        // Return the view with user data or null user
        return view('login', ['user' => $userData]);
    }
}
