<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/{any}', function () {
    return view('login');
})->where('any', '.*');



Route::post('/api/register', function (Request $request) {
    $email = $request->input('email');
    return response()->json(['email' => $email], 201);
})->name('register');


Route::post('/api/login', function (Request $request){
    return "logged in";
});
