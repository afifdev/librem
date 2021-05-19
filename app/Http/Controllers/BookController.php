<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Grade;
use App\Models\Kind;
use App\Models\Publisher;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    // [VIEW/GET] localhost:8000/admin/books
    public function index()
    {
        $books = Book::all();
        return view('Admin.Book.index', compact('books'));
    }

    // [VIEW/GET] localhost:8000/admin/books/register
    public function register()
    {
        $books = Book::all();
        $kinds = Kind::all();
        $categories = Category::all();
        $writers = Writer::all();
        $publishers = Publisher::all();
        $grades = Grade::all();


        return view('Admin.Book.register', compact('books', 'kinds', 'categories', 'writers', 'publishers', 'grades'));
    }

    // [VIEW/GET] localhost:8000/admin/books/:id
    public function detail()
    {
        return view('Admin.Book.detail');
    }

    // [VIEW/GET] localhost:8000/admin/books/:id/edit
    public function edit($id)
    {
        // Check if url false
        $get_book_id = Book::where('id', $id)->get();
        if ($get_book_id->isEmpty()) {
            abort(404);
        }

        $kinds = Kind::all();
        $categories = Category::all();
        $writers = Writer::all();
        $publishers = Publisher::all();
        $grades = Grade::all();
        $book = Book::where('id', $id)->get();
        $book = $book[0];
        return view('Admin.Book.edit', compact('book', 'kinds', 'categories', 'writers', 'publishers', 'grades'));
    }

    public function store(StoreBookRequest $request)
    {
        $attr = $request->all();

        // GRADE
        if ($request->grade_id === 0) {
            $attr['grade_id'] = null;
        }
        // IMAGE
        $imageTitle = \Str::slug($request->title);
        $image = request()->file('image');
        $imageUrl = $image->storeAs("images/books", "{$imageTitle}.{$image->extension()}");
        $attr['image'] = $imageUrl;

        Book::create($attr);

        return redirect()->route('bookRegister')
            ->with('success', 'Buku Berhasil Ditambahkan');
    }
    public function update(UpdateBookRequest $request, Book $book)
    {
        $attr = $request->all();

        $image = request()->file('image');
        if (isset($image)) {
            $imageTitle = \Str::slug($request->title);
            $imageUrl = $image->storeAs("images/books", "{$imageTitle}.{$image->extension()}");
            $attr['image'] = $imageUrl;
        } else {
            $imageUrl = $book->image;
        }

        $attr['image'] = $imageUrl;

        $book->update($attr);

        return redirect()->route('book')
            ->with('success', 'Buku Berhasil Diubah');
    }
    public function delete(Book $book)
    {
        Storage::delete($book->image);

        $book->delete();

        session()->flash('success', 'Buku berhasil dihapus');
        return redirect(route('book'));
    }
}
