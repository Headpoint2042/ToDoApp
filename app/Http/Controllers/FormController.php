<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller {
    public function submitForm(Request $request) {
        return response() -> json(['message' => 'Form submitted successfully']);
    }
}
