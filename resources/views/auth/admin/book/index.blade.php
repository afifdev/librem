@extends('layouts.admin.app')
@section('header')
<link rel="stylesheet" href="{{asset('css/admin/navigation.css')}}">
@endsection
@section('content')
<div class="container" style="margin-left: 40vh">
    @if(session()->has('success'))
    <p> {{ session()->get('success') }}</p>
    @endif
    <div class="mem-new py-4">
        <p>Book</p>
        <form action="{{route('search_books_admin') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-10">
                    <input name="search" type="search" id="form1" class="form-control"
                        placeholder="Search for books . . ." aria-label="Search" />
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>
    <a href="{{route('book_register')}}" class="btn bg-primary text-light">Tambah Data Buku</a>
    <div class="table-responsive py-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Code</th>
                    <th scope="col">Kind</th>
                    <th scope="col">Category</th>
                    <th scope="col">Writer</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Title</th>
                    <th scope="col">Availability</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Detail</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                <tr>
                    <th class="align-middle" scope="row">{{$loop->index + 1}}</th>
                    <td class="align-middle">{{ $book->code }}</td>
                    <td class="align-middle">{{ $book->kind->name }}</td>
                    <td class="align-middle">{{ $book->category ? $book->category->name : 'Tidak ada' }}</td>
                    <td class="align-middle">{{ $book->writer->name }}</td>
                    <td class="align-middle">{{ $book->publisher->name }}</td>
                    @if ($book->grade)
                    <td class="align-middle">{{ $book->grade->level }}</td>
                    @else
                    <td class="align-middle"> - </td>
                    @endif
                    <td class="align-middle">{{ $book->title }}</td>
                    <td class="align-middle">{{ $book->availability }}</td>
                    <td class="align-middle">{{ $book->isbn }}</td>
                    <td class="align-middle"><a href="{{route('book_detail', $book->id)}}"
                            class="btn bg-primary text-light">Detail</a></td>
                    <td class="align-middle"><a href="{{ route('book_edit', $book->id) }}"
                            class="btn btn-success">Edit</a></td>
                    <td class="align-middle">
                        <form action="{{ route('book_delete', $book->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                Tidak ada data
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $books->links() }}
    </div>
    <div class="py-4"></div>
</div>
@endsection