@extends('layouts.admin.app')
@section('header')
<title>Edit Buku</title>
<link rel="stylesheet" href="{{asset('css/admin/navigation.css')}}">
@endsection


@section('content')
<div class="container py-4" style="margin-left: 40vh">
    <form action=" {{ route('book_update', $book->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label" for="code">Kode</label>
                <input class="form-control" type="text" name="code" value="{{old('code')??$book->code}}">
                @error('code')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label" for="kind_id">Tipe</label>
                <select name="kind_id" id="kind_id" class="form-select">
                    @forelse ($kinds as $kind)
                    @if ($kind->id === $book->kind_id)
                    <option value="{{ $book->kind_id }}" selected>{{ $kind->name }}</option>
                    @else
                    <option value="{{ $kind->id }}">{{ $kind->name }}</option>
                    @endif
                    @empty
                    <option value="" hidden>Kosong</option>
                    @endforelse
                </select>
                @error('kind_id')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="category_id" class="form-label">Kategori</label>
                <select name="category_id" id="category_id" class="form-select">
                    @forelse ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @empty
                    <option value="" hidden>Kosong</option>
                    @endforelse
                </select>
                @error('category_id')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="writer_id" class="form-label">Penulis</label>
                <select name="writer_id" id="writer_id" class="form-select">
                    @forelse ($writers as $writer)
                    <option value="{{ $writer->id }}">{{ $writer->name }}</option>
                    @empty
                    <option value="" hidden>Kosong</option>
                    @endforelse
                </select>
                @error('writer_id')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="publisher_id" class="form-label">Penerbit</label>
                <select name="publisher_id" id="publisher_id" class="form-select">
                    @forelse ($publishers as $publisher)
                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                    @empty
                    <option value="" hidden>Kosong</option>
                    @endforelse
                </select>
                @error('publisher_id')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="grade_id" class="form-label">Kelas</label>
                <select name="grade_id" id="grade_id" class="form-select">
                    <option value="0">Tidak Mempunyai Kelas</option>
                    @forelse ($grades as $grade)
                    <option value="{{ $grade->id }}">{{ $grade->level }}</option>
                    @empty
                    <option value="" hidden>Kosong</option>
                    @endforelse
                </select>
                @error('grade_id')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label" for="title">Judul</label>
                <input class="form-control" type="text" name="title" value="{{old('title')??$book->title}}">
                @error('title')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label" for="description">Deskripsi</label>
                <input class="form-control" type="text" name="description"
                    value="{{old('description')??$book->description}}">
                @error('description')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label" for="isbn">ISBN</label>
                <input class="form-control" type="text" name="isbn" value="{{old('isbn')??$book->isbn}}">
                @error('isbn')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label" for="image">Foto/Gambar</label>
                <input class="form-control" type="file" name="image">
                @error('image')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
