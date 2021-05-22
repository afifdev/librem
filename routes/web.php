<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AdminController, ProfileController, BookController, HomeController, RuleController, StudentController, TeacherController, TransactionController, UserController};
use App\Http\Controllers\Auth\LoginController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/books/{kind}', [HomeController::class, 'show'])->name('show_books');
Route::post('/books/{kind}', [HomeController::class, 'handleSearch'])->name('search_books');
Route::get('/rule', [HomeController::class, 'rule'])->name('home-rule');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/login', [LoginController::class, 'viewLogin'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// If Login as Admin
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    Route::get('/admin/transaction', [TransactionController::class, 'index'])->name('transaction');
    Route::post('/admin/transaction', [TransactionController::class, 'search'])->name('trans_search');
    Route::get('/admin/transaction/register', [TransactionController::class, 'register'])->name('trans_register');
    Route::post('/admin/transaction/register', [TransactionController::class, 'create'])->name('trans_create');
    Route::get('/admin/transaction/{id}', [TransactionController::class, 'show'])->name('trans_show');
    Route::put('/admin/transaction/{id}', [TransactionController::class, 'update'])->name('trans_update');
    Route::delete('/admin/transaction/{id}', [TransactionController::class, 'delete'])->name('trans_delete');

    Route::get('/admin/student', [StudentController::class, 'index'])->name('student');
    Route::post('/admin/student', [StudentController::class, 'handleSearch'])->name('student_search');
    Route::get('/admin/student/register', [StudentController::class, 'register'])->name('student_register');
    Route::get('/admin/student/{student:nis}', [StudentController::class, 'detail'])->name('student_detail');
    Route::get('/admin/student/{student:nis}/edit', [StudentController::class, 'edit'])->name('student_edit');
    Route::post('/admin/student/store', [StudentController::class, 'store'])->name('student_store');
    Route::patch('/admin/student/{student:nis}/update', [StudentController::class, 'update'])->name('student_update');
    Route::delete('/admin/student/{student:nis}/delete', [StudentController::class, 'delete'])->name('student_delete');

    Route::get('/admin/teacher', [TeacherController::class, 'index'])->name('teacher');
    Route::get('/admin/teacher/register', [TeacherController::class, 'register'])->name('teacher_register');
    Route::get('/admin/teacher/{teacher:nip}', [TeacherController::class, 'detail'])->name('teacher_detail');
    Route::get('/admin/teacher/{teacher:nip}/edit', [TeacherController::class, 'edit'])->name('teacher_edit');
    Route::post('/admin/teacher/store', [TeacherController::class, 'store'])->name('teacher_store');
    Route::patch('/admin/teacher/{teacher:nip}/update', [TeacherController::class, 'update'])->name('teacher_update');
    Route::delete('/admin/teacher/{teacher:nip}/delete', [TeacherController::class, 'delete'])->name('teacher_delete');

    Route::get('/admin/book', [BookController::class, 'index'])->name('book');
    Route::post('/admin/book', [BookController::class, 'handleSearch'])->name('search_books_admin');
    Route::get('/admin/book/register', [BookController::class, 'register'])->name('book_register');
    Route::get('/admin/book/{book:id}', [BookController::class, 'detail'])->name('book_detail');
    Route::get('/admin/book/{book:id}/edit', [BookController::class, 'edit'])->name('book_edit');
    Route::post('/admin/book/store', [BookController::class, 'store'])->name('book_store');
    Route::patch('/admin/book/{book:id}/update', [BookController::class, 'update'])->name('book_update');
    Route::delete('/admin/book/{book:id}/delete', [BookController::class, 'delete'])->name('book_delete');

    Route::get('/admin/rule', [RuleController::class, 'index'])->name('rule');
    Route::post('/admin/rule', [RuleController::class, 'create'])->name('rule_register');
    Route::put('/admin/rule/{id}', [RuleController::class, 'updateAndDelete'])->name('rule_update');
});

// If Login as Student
Route::group(['middleware' => 'auth:student'], function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

// // If Login as Teacher
Route::group(['middleware' => 'auth:teacher'], function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});
