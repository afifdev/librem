<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rule;

class RuleController extends Controller
{
    public function index()
    {
        $rules = Rule::all();
        return view('Admin.Rule.index', compact('rules'));
    }

    public function create()
    {
        if (request()->new_rule && is_string(request()->new_rule)) {
            $rule = new Rule;
            $rule->desc = request()->new_rule;
            $rule->save();
        }
        return redirect()->route('rule');
    }

    public function updateAndDelete($id)
    {
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
    }
}
