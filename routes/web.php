<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('chat', [HomeController::class,'index'])->middleware('auth');
Route::get('/', [HomeController::class,'index'])->middleware('auth');

Route::get('/home', function () {
    return view('home');
})->middleware('auth');