<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\simplePaginate;
use App\Models\{Book, Kind, Rule};

class HomeController extends Controller
{
    public function index()
    {
        $kinds = Kind::all();
        $pathImage = '/images/home/';
        return view('index', compact('kinds', 'pathImage'));
    }

    public function show($kind)
    {
        // Check if url false
        $get_kind_id = Kind::where('name', $kind)->get();
        if ($get_kind_id->isEmpty()) {
            abort(404);
        }
        $kind_id = $get_kind_id[0]->id;
        $categories = Kind::find($kind_id)->categories;
        $books;
        if ($kind === 'courses') {
            $books = DB::table('kinds')->where('kinds.name',$kind)
                ->join('categories', 'categories.kind_id', '=', 'kinds.id')
                ->join('books', 'books.category_id', '=', 'categories.id')
                ->join('writers', 'writers.id', '=', 'books.writer_id')
                ->join('grades', 'grades.id', '=', 'books.grade_id')
                ->select('books.code as code', 'books.title as title', 'books.availability as availability', 'grades.level as grade', 'categories.name as category', 'writers.name as writer', 'books.isbn as isbn')->simplePaginate(10);
        } else {
            $books = DB::table('kinds')->where('kinds.name',$kind)
                ->join('categories', 'categories.kind_id', '=', 'kinds.id')
                ->join('books', 'books.category_id', '=', 'categories.id')
                ->join('writers', 'writers.id', '=', 'books.writer_id')
                ->select('books.code as code', 'books.title as title', 'books.availability as availability', 'categories.name as category', 'writers.name as writer', 'books.isbn as isbn')->simplePaginate(10);
        }
        return view('show', compact('books', 'kind', 'categories'));
    }

    public function handleSearch($kind)
    {
        // Check if url is false
        $get_kind_id = Kind::where('name', $kind)->get();
        if ($get_kind_id->isEmpty()) {
            abort(404);
        }
        $kind_id = $get_kind_id[0]->id;
        $form = request();
        $query = array();
        $books;
        if ($form->search && in_array($form->search_by, array('code', 'title', 'writer', 'isbn'))) {
            if ($form->search_by === 'writer') {
                array_push($query, array('writers.name', 'LIKE', '%' . $form->search . '%'));
            } else {
                array_push($query, array('books.' . $form->search_by, 'LIKE', '%' . $form->search . '%'));
            }
        }
        if ($form->availability && in_array($form->availability, array('terpinjam', 'tersedia'))) {
            if ($form->availability === 'terpinjam') {
                $form->availability = 0;
            } else {
                $form->availability = 1;
            }
            array_push($query, array('books.availability', '=', $form->availability));
        }
        if ($kind === 'courses' && in_array($form->grade, array(10, 11, 12))) {
            array_push($query, array('grades.level', '=', $form->grade));
        }
        if ($form->course && $form->course !== 'all') {
            array_push($query, array('categories.name', 'LIKE', '%' . $form->course . '%'));
        }
        if ($kind === 'courses') {
            $books = DB::table('kinds')->where('kinds.name', $kind)
                ->join('categories', 'categories.kind_id', '=', 'kinds.id')
                ->join('books', 'books.category_id', '=', 'categories.id')
                ->join('grades', 'grades.id', '=', 'books.grade_id')
                ->join('writers', 'writers.id', '=', 'books.writer_id')
                ->select('books.code as code', 'books.title as title', 'books.availability as availability', 'grades.level as grade', 'categories.name as category', 'writers.name as writer', 'books.isbn as isbn')->where($query)->simplePaginate(10);
        } else {
            $books = DB::table('kinds')->where('kinds.name', $kind)
                ->join('categories', 'categories.kind_id', '=', 'kinds.id')
                ->join('books', 'books.category_id', '=', 'categories.id')
                ->join('writers', 'writers.id', '=', 'books.writer_id')
                ->select('books.code as code', 'books.title as title', 'books.availability as availability', 'categories.name as category', 'writers.name as writer', 'books.isbn as isbn')->where($query)->simplePaginate(10);
        }
        $categories = Kind::find($kind_id)->categories;
        return view('show', compact('books', 'kind', 'categories'));
    }

    public function about()
    {
        return view('about');
    }

    public function rule() {
        $rules = Rule::all();
        return view('rule', compact('rules'));
    }
}
