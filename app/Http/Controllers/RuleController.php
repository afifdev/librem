<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rule;

class RuleController extends Controller
{
<<<<<<< HEAD
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
=======
    public function index() {
        $rules = Rule::all();
        return view('Admin.Rule.index', compact('rules'));
    }

    public function create() {
        if (request()->new_rule && is_string(request()->new_rule)) {
            $rule = new Rule;
            $rule->desc = request()->new_rule;
            $rule->save();
        }
        return redirect()->route('rule');
    }

    public function updateAndDelete($id) {
        $rule = Rule::find($id);
        if ($rule) {
            if (request()->update && request()->prev_rule && is_string(request()->prev_rule)) {
                $rule->desc = request()->prev_rule;
                $rule->save();
            } else if (request()->delete) {
                $rule->delete();
            }
        }
        return redirect()->route('rule');
>>>>>>> 87435a77a47a3be4a0ad813693256216127c8300
    }
}
