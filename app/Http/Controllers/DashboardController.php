<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function createTask(Request $request) {

    }

    public function getTasks($userEmail) {

        return "Something from the backend" . $userEmail;
    }
}
