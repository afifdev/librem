<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    // [VIEW/GET] localhost:8000/admin/books
    public function index() {
        return view('Admin.Book.index');
    }

    // [VIEW/GET] localhost:8000/admin/books/register
    public function register() {
        return view('Admin.Book.register');
    }

    // [VIEW/GET] localhost:8000/admin/books/:id
    public function detail() {
        return view('Admin.Book.detail');
    }

    // [VIEW/GET] localhost:8000/admin/books/:id/edit
    public function edit() {
        return view('Admin.Book.edit');
    }
}
