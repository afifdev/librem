@extends('layouts.user.app')

@section('title', 'Librem')

@section('header')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />

<!-- My CSS -->
{{-- <link rel="stylesheet" href="{{ asset('css/home/style.css') }}" /> --}}
<link rel="stylesheet" href="{{ asset('css/home/show.css') }}" />
@endsection

<body>
    @include('layouts.user.navigation')
    <div class="container-xl">
        <!-- judul -->
        <h1>Non Fiksi</h1>
        <p>Informasi yang didasari oleh data akurat</p>

        <form action="{{route('search_books', ['kind' => $kind])}}" method="POST">
            @csrf
            <!-- searching -->
            <div class="form-outline">
                <input name="search" type="search" id="form1" class="form-control" placeholder="Search for anything...."
                    aria-label="Search" />
            </div>
            <select name="search_by">
                <option value="code">code</option>
                <option value="title">title</option>
                <option value="writer">writer</option>
                <option value="isbn">isbn</option>
            </select>
            <br>
            <p>Filter</p>
            <select name="availability">
                <option value="all">all</option>
                <option value="terpinjam">terpinjam</option>
                <option value="tersedia">tersedia</option>
            </select>
            @if($kind === 'courses')
            <select name="grade">
                <option value="all">all</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
            @endif
            <select name="course">
                <option value="all">all</option>
                @foreach ($categories as $category)
                <option value="{{$category->name}}">{{$category->name}}</option>
                @endforeach
            </select>
            <button type="submit">Submit</button>
        </form>
        <table>
            <tr>
                <th>No</th>
                <th>Code</th>
                <th>Title</th>
                <th>Avilability</th>
                @if($kind === 'courses')
                <th>Class</th>
                @endif
                <th>Category</th>
                <th>Writer</th>
                <th>ISBN</th>
            </tr>
            @foreach ($books as $book)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$book->code}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->availability === 1? 'tersedia' : 'terpinjam'}}</td>
                @if($kind === 'courses')
                <td>{{$book->grade}}</td>
                @endif
                <td>{{$book->category}}</td>
                <td>{{$book->writer}}</td>
                <td>{{$book->isbn}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
