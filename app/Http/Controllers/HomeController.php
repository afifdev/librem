<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Book, Category, Kind, Transaction, Writer};
class HomeController extends Controller
{
    public function index()
    {
        $pathImage = 'images/home/';
        return view('Home.index', compact('pathImage'));
    }

    public function show($kind) {
        // Check if url false
        $get_kind_id = Kind::where('name', $kind)->get();
        if ($get_kind_id->isEmpty()) {
            abort(404);
        }
        $kind_id = $get_kind_id[0]->id;
        $books = Book::where('kind_id', $kind_id)->get();
        $categories = Kind::find($kind_id)->categories;
        return view('Home.show', compact('books', 'kind', 'categories'));
    }
    
    public function handleSearch($kind) {
        // Check if url is false
        $get_kind_id = Kind::where('name', $kind)->get();
        if ($get_kind_id->isEmpty()) {
            abort(404);
        }
        $kind_id = $get_kind_id[0]->id;
        $queryArray = array(['kind_id','=',$kind_id]);
        $books;
        $writers;

        // Filter
        if (request()->search) {
            $search = request()->search;
            if (request()->search_by === 'writer') {
                $writers = Writer::where([['name', 'LIKE', "%{$search}%"]])->get();
            } else {
                array_push($queryArray, array(request()->search_by,'LIKE',"%{$search}%"));
            }
        }
        if (in_array(request()->availability, array('tersedia', 'terpinjam'))) {
            $availID;
            if (request()->availability === 'tersedia') {
                $availID = 1;
            } else {
                $availID = 0;
            }
            array_push($queryArray, array('availability','=',$availID));
        }
        if ($kind === 'pelajaran' && request()->grade !== 'all') {
            array_push($queryArray, array('grade_id','=',intval(request()->grade)-9));
        }
        if ($kind === 'pelajaran' && request()->course !== 'all') {
            $category = Category::where('name',request()->course)->get()[0]->id;
            array_push($queryArray, array('category_id','=',$category));
        }
        if (request()->search_by === 'writer' && count($writers) > 1) {
            $writers_id = array();
            foreach($writers as $writer) {
                array_push($writers_id, $writer->id);
            }
            $books = Book::where($queryArray)->whereIn('writer_id', $writers_id)->get();
        } else if (request()->search_by === 'writer') {
            array_push($queryArray, array('writer_id','=',$writers[0]->id));
            $books = Book::where($queryArray)->get();
        } else {
            $books = Book::where($queryArray)->get();
        }
        $categories = Kind::find($kind_id)->categories;
        return view('Home.show',compact('books', 'kind', 'categories'));
    }

    // localhost:8000/about
    public function about()
    {
        return view('Home.about');
    }
}
