<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // [VIEW/GET] localhost:8000/admin/transaction
    public function index() {
        return view('Admin.Transaction.index');
    }

    // [VIEW/GET] localhost:8000/admin/transaction/register
    public function register() {
        return view('Admin.Transaction.register');
    }

    // [VIEW/GET] localhost:8000/admin/transaction/:id
    public function detail() {
        return view('Admin.Transaction.detail');
    }

    // [VIEW/GET] localhost:8000/admin/transaction/:id/edit
    public function edit() {
        return view('Admin.Transaction.edit');
    }
}
