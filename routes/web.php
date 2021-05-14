<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// AUTH NEW
Route::post('/login/roles', [LoginController::class, 'selectRoles'])->name('selectRoles');
Route::post('/login/admin', [LoginController::class, 'adminLogin'])->name('login.admin');
Route::post('/login/siswa', [LoginController::class, 'siswaLogin'])->name('login.siswa');
Route::post('/login/guru', [LoginController::class, 'guruLogin'])->name('login.guru');
Route::post('/register/admin', [RegisterController::class, 'createAdmin'])->name('register.admin');
Route::post('/register/siswa', [RegisterController::class, 'createSiswa'])->name('register.siswa');
Route::post('/register/guru', [RegisterController::class, 'createGuru'])->name('register.guru');
Route::get('logout', [LoginController::class, 'logout'])->name('logout'); //LOGOUT

// MIDDLEWARE

// MIDDLEWARE ADMIN
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    // Regist Siswa
    Route::get('/admin/siswa/register', [RegisterController::class, 'showSiswaRegisterForm'])->name('showSiswaRegisterForm');
    Route::post('/admin/siswa/register', [RegisterController::class, 'createSiswa'])->name('register.siswa');
    // Regist Guru
    Route::get('/admin/guru/register', [RegisterController::class, 'showGuruRegisterForm'])->name('showGuruRegisterForm');
    Route::post('/admin/guru/register', [RegisterController::class, 'createGuru'])->name('register.guru');
});


// MIDDLEWARE SISWA
Route::group(['middleware' => 'auth:siswa'], function () {
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
});

// MIDDLEWARE GURU
Route::group(['middleware' => 'auth:guru'], function () {
    Route::get('/guru', [GuruController::class, 'index'])->name('guru');
});
