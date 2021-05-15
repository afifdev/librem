<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    // [VIEW/GET] localhost:8000/admin/student
    public function index() {
        return view('Admin.Student.index');
    }

    // [VIEW/GET] localhost:8000/admin/student/register
    public function register() {
        return view('Admin.Student.register');
    }

    // [VIEW/GET] localhost:8000/admin/student/:id
    public function detail() {
        return view('Admin.Student.detail');
    }

    // [VIEW/GET] localhost:8000/admin/student/:id/edit
    public function edit() {
        return view('Admin.Student.edit');
    }
}
