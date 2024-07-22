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
Route::post('/adminpost',[\App\Http\Controllers\admincontroller::class, 'adminPost'])->name('admin.mainPost');
Route::get('/ajout_manuel',[\App\Http\Controllers\admincontroller::class, 'ajout_manuel'])->name('admin.ajout_manuel');
Route::get('/ajout_manuel_attest',[\App\Http\Controllers\admincontroller::class, 'ajout_manuel_attest'])->name('admin.ajout_manuel_attest');
Route::get('/ajout_excel',[\App\Http\Controllers\admincontroller::class, 'ajout_excel'])->name('admin.ajout_excel');
Route::get('/ajout_excel_attest',[\App\Http\Controllers\admincontroller::class, 'ajout_excel_attest'])->name('admin.ajout_excel_attest');

Route::post('/rempli',[\App\Http\Controllers\admincontroller::class, 'rempli'])->name('admin.rempli');
Route::post('/remplir_releve',[\App\Http\Controllers\admincontroller::class, 'remplirReleve'])->name('admin.remplir_releve');
Route::post('/import_excel',[\App\Http\Controllers\admincontroller::class, 'import_excel'])->name('admin.import_excel');
Route::post('/generate_ocr',[\App\Http\Controllers\admincontroller::class, 'ocr'])->name('admin.ocr');
Route::post('/generate_ocr2',[\App\Http\Controllers\admincontroller::class, 'ocr2'])->name('admin.ocr2');
Route::get('/scan_releve',[\App\Http\Controllers\admincontroller::class, 'scan'])->name('admin.scan');
Route::get('/scan_attestation',[\App\Http\Controllers\admincontroller::class, 'scanAttestation'])->name('admin.scanAttestation');
Route::get('/scan_releve2',[\App\Http\Controllers\admincontroller::class, 'continuescan'])->name('admin.continuescan');
Route::post('/qr',[\App\Http\Controllers\admincontroller::class, 'qr'])->name('admin.qr');
Route::post('/ver1',[\App\Http\Controllers\admincontroller::class, 'verification1'])->name('admin.verification1');
Route::post('/ver2',[\App\Http\Controllers\admincontroller::class, 'verification2'])->name('admin.verification2');
Route::post('/adminUpd',[\App\Http\Controllers\admincontroller::class, 'adminUpdate'])->name('admin.main.update');
Route::post('/adminDel',[\App\Http\Controllers\admincontroller::class, 'adminDelete'])->name('admin.main.delete');
Route::post('/relDel',[\App\Http\Controllers\Relevecontroller::class, 'releve_delete'])->name('admin.reldelete');
Route::get('/releve',[\App\Http\Controllers\Relevecontroller::class, 'releve'])->name('admin.releve');
Route::post('/releve',[\App\Http\Controllers\Relevecontroller::class, 'relevesSeach']);
Route::get('/attestation',[\App\Http\Controllers\AttestationController::class, 'attestation'])->name('admin.attestation');
Route::post('/attestation',[\App\Http\Controllers\AttestationController::class, 'attestationSearch']);
Route::get('/view_releve/{mat}/{idR}',[\App\Http\Controllers\Relevecontroller::class, 'view_releve'])->name('admin.view_releve');
Route::get('/view_attestation/{mat}/{idA}',[\App\Http\Controllers\AttestationController::class, 'view_attestation'])->name('admin.view_attestation');
Route::get('/view_releve_remp',[\App\Http\Controllers\Relevecontroller::class, 'view_releve_remp'])->name('admin.view_releve_remp');
Route::get('/downloadpdf',[\App\Http\Controllers\pdfController::class,'genererPDF'])->name('generatepdf');
Route::get('/downloadpdf_attest',[\App\Http\Controllers\pdfController::class,'genererPDF2'])->name('generatepdf2');

Route::get('/user',[\App\Http\Controllers\usercontroller::class, 'user'])->name('user.main');
Route::post('/user',[\App\Http\Controllers\usercontroller::class, 'userPost']);
Route::get('/user/vieWRelUti/{mat}/{idR}',[\App\Http\Controllers\usercontroller::class, 'vieWRelUti'])->name('user.vieWRelUti');


Route::get('/scanqr',[\App\Http\Controllers\admincontroller::class, 'scanqr'])->name('admin.scanqr');
Route::get('/scanocr',[\App\Http\Controllers\admincontroller::class, 'scanocr'])->name('admin.scanocr');

