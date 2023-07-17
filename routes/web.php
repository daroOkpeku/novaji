<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// encrypt and decrypt strings
Route::get('/', [AuthController::class, "home"]);
Route::get('/encrypt/{word}', [AuthController::class, "encrypt"]);
Route::post('/decryptdata', [AuthController::class, "decryptdata"]);
//end  encrypt and decrypt strings


// Online Registration Form
Route::get('/register', [AuthController::class, "register"]);
Route::post('/registerdata', [AuthController::class, "registerdata"]);
