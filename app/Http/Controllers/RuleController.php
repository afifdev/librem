<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RuleController extends Controller
{
    // [VIEW/GET] localhost:8000/admin/rules
    public function index() {
        return view('Admin.Rule.index');
    }

    // [VIEW/GET] localhost:8000/admin/rules/edit
    public function edit() {
        return view('Admin.Rule.edit');
    }
}
