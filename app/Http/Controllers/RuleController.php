<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RuleController extends Controller
{
    // [VIEW/GET] localhost:8000/admin/rules
    public function index()
    {
        if (auth()->guard('admin')->check()) {
            return view('Admin.Rule.index');
        }
        return view('Home.rule');
    }

    // [VIEW/GET] localhost:8000/admin/rules/edit
    public function edit()
    {
        return view('Admin.Rule.edit');
    }
}
