<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AdminController, BookController, HomeController, RuleController, StudentController, TeacherController, TransactionController, UserController};
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/login', [LoginController::class, 'viewLogin'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('postLogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();
// If Login as Admin
// Route::group(['middleware' => 'auth:admin'], function () {
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/admin/transaction', [TransactionController::class, 'index'])->name('transaction');
Route::get('/admin/transaction/register', [TransactionController::class, 'register'])->name('transRegister');
Route::get('/admin/transaction/:id', [TransactionController::class, 'detail'])->name('transDetail');
Route::get('/admin/transaction/:id/edit', [TransactionController::class, 'edit'])->name('transEdit');

Route::get('/admin/student', [StudentController::class, 'index'])->name('student');
Route::get('/admin/student/register', [StudentController::class, 'register'])->name('studentRegister');
Route::get('/admin/student/:id', [StudentController::class, 'detail'])->name('studentDetail');
Route::get('/admin/student/:id/edit', [StudentController::class, 'edit'])->name('studentEdit');

Route::get('/admin/teacher', [TeacherController::class, 'index'])->name('teacher');
Route::get('/admin/teacher/register', [TeacherController::class, 'register'])->name('teacherRegister');
Route::get('/admin/teacher/:id', [TeacherController::class, 'detail'])->name('teacherDetail');
Route::get('/admin/teacher/:id/edit', [TeacherController::class, 'edit'])->name('teacherEdit');

Route::get('/admin/book', [BookController::class, 'index'])->name('book');
Route::get('/admin/book/register', [BookController::class, 'register'])->name('bookRegister');
Route::get('/admin/book/:id', [BookController::class, 'detail'])->name('bookDetail');
Route::get('/admin/book/:id/edit', [BookController::class, 'edit'])->name('bookEdit');
Route::post('/admin/book/store', [BookController::class, 'store'])->name('bookStore');
Route::patch('/admin/book/:id/update', [BookController::class, 'update'])->name('bookUpdate');
Route::delete('/admin/book/:id/delete', [BookController::class, 'delete'])->name('bookDelete');

Route::get('/rule', [RuleController::class, 'index'])->name('rule');
Route::get('/rule/edit', [RuleController::class, 'edit'])->name('ruleEdit');
// });

// If Login as Student
Route::group(['middleware' => 'auth:student'], function () {
    Route::get('/student', [StudentController::class, 'index'])->name('siswa');
});

// If Login as Teacher
Route::group(['middleware' => 'auth:teacher'], function () {
    Route::get('/teacher', [TeacherController::class, 'index'])->name('guru');
});
