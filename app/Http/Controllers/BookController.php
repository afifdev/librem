<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Kind;
use App\Models\Publisher;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    // [VIEW/GET] localhost:8000/admin/books
    public function index()
    {
        return view('Admin.Book.index');
    }

    // [VIEW/GET] localhost:8000/admin/books/register
    public function register()
    {
        $kinds = Kind::all();
        $categories = Category::all();
        $writers = Writer::all();
        $publishers = Publisher::all();

        return view('Admin.Book.register', compact('kinds', 'categories', 'writers', 'publishers'));
    }

    // [VIEW/GET] localhost:8000/admin/books/:id
    public function detail()
    {
        return view('Admin.Book.detail');
    }

    // [VIEW/GET] localhost:8000/admin/books/:id/edit
    public function edit()
    {
        return view('Admin.Book.edit');
    }

    public function store(BookRequest $request)
    {
        Book::create($request->all());

        return redirect()->route('bookRegister')
            ->with('success', 'Buku Berhasil Ditambahkan');
    }
}
