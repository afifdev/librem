@extends('layouts.admin.app')
@section('header')
<link rel="stylesheet" href="{{asset('css/admin/navigation.css')}}">
@endsection


@section('content')
<div class="container" style="margin-left: 40vh">
    <div class="container">
        @if(session()->has('success'))
        <p> {{ session()->get('success') }}</p>
        @endif
        <form action="{{route('search_books_admin') }}" method="POST">
            @csrf
            <!-- searching -->
            <div class="form-outline">
                <input name="search" type="search" id="form1" class="form-control"
                    placeholder="Search for Book Title..." aria-label="Search" />
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
            <br><br>
        </form>


        <table class="table">
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
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $books as $book)
                <tr>
                    <th scope="row">{{$loop->index + 1}}</th>
                    <td>{{ $book->code }}</td>
                    <td>{{ $book->kind->name }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>{{ $book->writer->name }}</td>
                    <td>{{ $book->publisher->name }}</td>
                    @if ($book->grade)
                    <td>{{ $book->grade->level }}</td>
                    @else
                    <td> - </td>
                    @endif
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->availability }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td><a href="{{ route('book_edit', $book->id) }}">Edit</a></td>
                    <td>
                        <form action="{{ route('book_delete', $book->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                Tidak ada data
                @endforelse
            </tbody>
        </table>

        {{ $books->links() }}
    </div>
</div>
@endsection
