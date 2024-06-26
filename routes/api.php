<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/register', [AuthenticationController::class, 'register'])->name('register');


Route::post('/login', [AuthenticationController::class, 'authenticate'])->name('login');

Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout')->middleware('auth:sanctum');

Route::get('/getTasks/{userEmail}', [DashboardController::class, 'getTasks'])->middleware('auth:sanctum');
