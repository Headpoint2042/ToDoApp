<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function createTask(Request $request){

        $validatedData = $request ->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8'
        ]);

        $user = new User();

        $user -> email = $validatedData['email'];
        $user -> password = $validatedData['password'];

        $user -> save();

        return "created successfully";
    }
}
