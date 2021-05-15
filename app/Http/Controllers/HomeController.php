<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // localhost:8000/
    public function index() {
        return view('Home.index');
    }

    // localhost:8000/about
    public function about() {
        return view('Home.about');
    }
}
