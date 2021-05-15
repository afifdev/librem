<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{BookController, HomeController, RuleController, StudentController, TransactionController, UserController};

Route::get('/', [HomeContoller::class, 'index'])->name('homepage');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/admin/transaction', [TransactionController::class, 'index'])->name('transaction');
Route::get('/admin/transaction/register', [TransactionController::class, 'register'])->name('transRegister');
Route::get('/admin/transaction/:id', [TransactionController::class, 'detail'])->name('transDetail');
Route::get('/admin/transaction/:id/edit', [TransactionController::class, 'edit'])->name('transEdit');

Route::get('/admin/student', [StudentController::class, 'index'])->name('student');
Route::get('/admin/student/register', [StudentController::class, 'register'])->name('studentRegister');
Route::get('/admin/student/:id', [StudentController::class, 'detail'])->name('studentDetail');
Route::get('/admin/student/:id/edit', [StudentController::class, 'edit'])->name('studentEdit');

Route::get('/admin/book', [BookController::class, 'index'])->name('book');
Route::get('/admin/book/register', [BookController::class, 'register'])->name('bookRegister');
Route::get('/admin/book/:id', [BookController::class, 'detail'])->name('bookDetail');
Route::get('/admin/book/:id/edit', [BookController::class, 'edit'])->name('bookEdit');

Route::get('/rule', [RuleController::class, 'index'])->name('rule');
Route::get('/rule/edit', [RuleController::class, 'edit'])->name('ruleEdit'); 
Route::get('/', function () {
    return view('welcome');
});