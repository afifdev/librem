<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // [VIEW/GET] localhost:8000/admin/teacher
    public function index()
    {
        return view('Admin.Teacher.index');
    }

    // [VIEW/GET] localhost:8000/admin/teacher/register
    public function register()
    {
        return view('Admin.Teacher.register');
    }

    // [VIEW/GET] localhost:8000/admin/teacher/:id
    public function detail()
    {
        return view('Admin.Teacher.detail');
    }

    // [VIEW/GET] localhost:8000/admin/teacher/:id/edit
    public function edit()
    {
        return view('Admin.Teacher.edit');
    }
}
