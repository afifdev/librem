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
use Illuminate\Pagination\simplePaginate;


class BookController extends Controller
{
    public function index()
    {
        $books = Book::simplePaginate(20);
        return view('auth.admin.book.index', compact('books'));
    }

    public function register()
    {
        $books = Book::all();
        $kinds = Kind::all();
        $categories = Category::all();
        $writers = Writer::all();
        $publishers = Publisher::all();
        $grades = Grade::all();


        return view('auth.admin.book.register', compact('books', 'kinds', 'categories', 'writers', 'publishers', 'grades'));
    }

    public function detail($id)
    {
        $book = Book::find($id);
        if (!$book) {
            abort(404);
        }
        return view('auth.admin.book.show', compact('book'));
    }

    public function edit($id)
    {
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
        return view('auth.admin.book.edit', compact('book', 'kinds', 'categories', 'writers', 'publishers', 'grades'));
    }

    public function store(StoreBookRequest $request)
    {
        $attr = $request->all();

        // CUSTOM CATEGORY
        $kind_id = $request->kind_id;
        if ($request->custom_category) {
            Category::create([
                'kind_id' => $kind_id,
                'name' => $request->custom_category,
            ]);
            $attr['category_id'] = DB::getPdo()->lastInsertId();;
        }

        // CUSTOM WRITER
        if ($request->custom_writer) {
            Writer::create([
                'name' => $request->custom_writer,
            ]);
            $attr['writer_id'] = DB::getPdo()->lastInsertId();
        }

        // CUSTOM PUBLISHER
        if ($request->publisher_id === 'tambah') {
            Publisher::create([
                'name' => $request->custom_publisher_name,
                'year' => $request->custom_publisher_year,
                'city' => $request->custom_publisher_city,
            ]);
            $attr['publisher_id'] = DB::getPdo()->lastInsertId();
        }

        // GRADE
        if ($request->grade_id === 0) {
            $attr['grade_id'] = null;
        }
        // IMAGE
        $imageTitle = \Str::slug($request->title);
        $image = request()->file('image');
        $imageUrl = $image->storeAs("images/books", "{$imageTitle}.{$image->extension()}");
        $attr['image'] = $imageUrl;
        // dd($attr);

        $book = new Book;
        $book->code = $attr['code'];
        $book->kind_id = $attr['kind_id'];
        $book->category_id = $attr['category_id'];
        $book->publisher_id = $attr['publisher_id'];
        $book->grade_id = $attr['grade_id'];
        $book->title = $attr['title'];
        $book->description = $attr['description'];
        $book->image = $attr['image'];
        $book->availability = 1;
        $book->writer_id = $attr['writer_id'];
        $book->isbn = $attr['isbn'];
        $book->save();
        // Book::create($attr);

        return redirect()->route('book')
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

    public function handleSearch()
    {
        $form = request();
        if (isset($form->search)) {
            $books = Book::where('title', 'like', '%' . $form->search . '%')->simplePaginate(20);
        } else {
            $books = Book::simplePaginate(20);
        }
        return view('auth.admin.book.index', compact('books'));
    }
}
