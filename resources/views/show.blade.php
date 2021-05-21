@extends('layouts.app')

@section('title', 'Librem')

@section('header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
<link rel="stylesheet" href="{{ asset('css/navigation.css') }}" />
<link rel="stylesheet" href="{{ asset('css/show.css') }}" />
@endsection
@section('content')
<div class="route-home-show">
    <div class="container-xl">
        <!-- judul -->
        <h1>{{ucfirst($kind)}}</h1>
        @switch($kind)
        @case('courses')
        <p>Buku panduan kegiatan ajar mengajar SMA Pelita Nusa</p>
        @break
        @case('fictions')
        <p>Buku non-ilmiah pelipur bosan</p>
        @break
        @case('nonfictions')
        <p>Informasi yang didasari oleh data akurat</p>
        @break
        @case('newspapers')
        <p>Membuka wawasan umum yang terjadi di dunia</p>
        @break
        @case('dictionaries')
        <p>Memperluas skill komunikasi kelas nasional maupun internasional</p>
        @break
        @default
        <p>Kisah klasik di sekolah beserta Hal-hal bermanfaat diluar sekolah </p>
        @endswitch
        <!-- searching -->
        <form action="{{route('search_books', ['kind' => $kind])}}" method="POST">
            @csrf
            <div class="form-outline">
                <input type="search" name="search" id="form1" class="form-control" placeholder="Search for anything...."
                    aria-label="Search" />
            </div>
            <select name="search_by" class="form-select">
                <option value="all">Search By</option>
                <option value="code">code</option>
                <option value="title">title</option>
                <option value="writer">writer</option>
                <option value="isbn">isbn</option>
            </select>
            <h3>Filter</h3>
            <select name="availability" class="form-select">
                <option value="all">Status buku . . .</option>
                <option value="tersedia">tersedia</option>
                <option value="terpinjam">terpinjam</option>
            </select>
            <br>
            @if ($kind === 'courses')
            <select class="dropdown">
                <div class="dropdown-select">
                    <i class="fa fa-angle-down icon"></i>
                </div>
                <div name="grade" class="dropdown-list">
                    <option value="all">Kelas</option>
                    <option value="10">X</option>
                    <option value="11">XI</option>
                    <option value="12">XII</option>
                </div>
            </select>
            &emsp14;&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;
            @endif
            <select class="dropdown" name="course">
                <div class="dropdown-select">
                    <i class="fa fa-angle-down icon"></i>
                </div>
                <div class="dropdown-list">
                    <option value="all">Kategori</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->name}}">{{$category->name}}</option>
                    @endforeach
                </div>
            </select>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <br><br>
        <!-- tabel -->
        <table class="table ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Buku</th>
                    <th>Kode</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    {{-- kalau dalam kategori course maka tampilkan kolom kelas --}}
                    @if ($kind === 'courses')
                    <th>Kelas</th>
                    @endif
                    <th>ISBN</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->code}}</td>
                    <td>{{$book->writer}}</td>
                    <td>{{$book->category}}</td>
                    @if ($kind === 'courses')
                    <td>{{$book->grade}}</td>
                    @endif
                    <td>{{$book->isbn}}</td>
                    <td>{{$book->availability === 1 ? 'tersedia' : 'terpinjam'}}</td>
                </tr>
                @endforeach
                {{-- <tr>
                    <td>4</td>
                    <td>Sel Tubuh Makhluk Hidup</td>
                    <td>Richard Ambrezd</td>
                    <td>XII</td>
                    <td>55</td>
                    <td>ada</td>
                </tr> --}}
            </tbody>
        </table>
        <!-- paginate -->
        <nav aria-label="Page navigation example">
            <div class="pagination">
                {{$books->links()}}
            </div>
        </nav>
    </div>
</div>
@endsection