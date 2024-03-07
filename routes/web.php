<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthenticationController;

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



Route::post('/api/register', [AuthenticationController::class, 'register'])->name('register');


Route::post('/api/login', [AuthenticationController::class, 'authenticate'])->name('login');

Route::post('/api/logout', [AuthenticationController::class, 'logout'])->name('logout')->middleware('auth:sanctum');
