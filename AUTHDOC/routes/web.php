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


Route::get('/', function () {return view('Home.home');});
Route::get('/login',[\App\Http\Controllers\Authcontroller::class, 'login'])->name('auth.login');
Route::get('/signup',[\App\Http\Controllers\Authcontroller::class, 'signup'])->name('auth.signup');
Route::post('/signup',[\App\Http\Controllers\Authcontroller::class, 'signupPost']);
Route::post('/login',[\App\Http\Controllers\Authcontroller::class, 'loginPost']);
Route::get('/admin',[\App\Http\Controllers\admincontroller::class, 'admin'])->name('admin.main');
Route::post('/admin',[\App\Http\Controllers\admincontroller::class, 'adminPost']);
Route::get('/ajout_manuel',[\App\Http\Controllers\admincontroller::class, 'ajout_manuel'])->name('admin.ajout_manuel');
Route::get('/ajout_excel',[\App\Http\Controllers\admincontroller::class, 'ajout_excel'])->name('admin.ajout_excel');

Route::post('/rempli',[\App\Http\Controllers\admincontroller::class, 'rempli'])->name('admin.rempli');
Route::post('/remplir_releve',[\App\Http\Controllers\admincontroller::class, 'remplirReleve'])->name('admin.remplir_releve');
Route::post('/import_excel',[ReleveController::class, 'import_excel'])->name('import_excel');
//Route::post('/admin',[\App\Http\Controllers\admincontroller::class, 'adminUpdate'])->name('admin.main.update');
Route::get('/releve',[\App\Http\Controllers\Relevecontroller::class, 'releve'])->name('admin.releve');
Route::post('/view_releve',[\App\Http\Controllers\Relevecontroller::class, 'view_releve'])->name('admin.view_releve');
Route::get('/view_releve_remp',[\App\Http\Controllers\Relevecontroller::class, 'view_releve_remp'])->name('admin.view_releve_remp');

Route::get('/user',[\App\Http\Controllers\usercontroller::class, 'user'])->name('user.main');


