<?php

use Illuminate\Support\Facades\Route;

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


<<<<<<< Updated upstream
Route::get('/', function () {return view('Home/home');});
Route::get('/auth/login',[\App\Http\Controllers\Authcontroller::class, 'login'])->name('login');
Route::get('/auth/signup',[\App\Http\Controllers\Authcontroller::class, 'signup'])->name('signup');

=======
Route::get('/', function () {return view('Home.home');});
Route::get('/login',[\App\Http\Controllers\Authcontroller::class, 'login'])->name('auth.login');
Route::get('/signup',[\App\Http\Controllers\Authcontroller::class, 'signup'])->name('auth.signup');
Route::post('/signup',[\App\Http\Controllers\Authcontroller::class, 'signupPost']);
Route::post('/login',[\App\Http\Controllers\Authcontroller::class, 'loginPost']);
Route::get('/admin',[\App\Http\Controllers\admincontroller::class, 'admin'])->name('admin.main');
Route::get('/user',[\App\Http\Controllers\usercontroller::class, 'user'])->name('user.main');
Route::get('/home',[\App\Http\Controllers\Authcontroller::class, 'home'])->name('Home.home');
>>>>>>> Stashed changes

