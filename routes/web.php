<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('adminlogin');
});

Route::get('/admin-login', function () {
    return view('adminlogin');
});

Route::post("/check", [AdminController::class, 'check'])->name('check');

Route::get('/register',[ValidationController::class, 'registerValidation'])->name('form');
Route::post('/post-register',[ValidationController::class, 'validateRegister'])->name('valid');
Route::get('/login', [ValidationController::class, 'loginpage'])->name('login');
Route::post('/post-login',[ValidationController::class, 'loginForm'])->name('auth');


Route::get('/users',[UserController::class,'index'])->name('index');
Route::post('/user',[UserController::class,'store'])->name('store');
Route::get('/home',[UserController::class,'list'])->name('list')->middleware('authcheck');

Route::get("/logout", [AdminController::class, 'logout']);

Route::get('user_export',[AdminController::class, 'get_student_data'])->name('student.export');


