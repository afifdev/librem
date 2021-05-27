@extends('layouts.admin.app')
@section('header')
<title>Tambah Buku</title>
<link rel="stylesheet" href="{{asset('css/admin/navigation.css')}}">
@endsection
@section('content')
<div class="container" style="margin-left: 40vh">
    <form action=" {{ route('book_store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="row g-3 py-4">
            <div class="col-md-4">
                <label for="code" class="form-label">Kode</label>
                <input type="text" name="code" class="form-control">
                @error('code')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="kind_id" class="form-label">Tipe</label>
                <select name="kind_id" id="kind_id" class="form-select">
                    @forelse ($kinds as $kind)
                    <option value="{{ $kind->id }}">{{ $kind->name }}</option>
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
                <label for="custom_category" class="form-label">Kategori Lain</label>
                <input type="text" name="custom_category" placeholder="Kategori Lain" class="form-control">
                @error('custom_category')
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
                <label for="custom_writer" class="form-label">Penulis lain</label>
                <input type="text" name="custom_writer" placeholder="Writer Lain" class="form-control">
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
                <label for="custom_publisher_name" class="form-label">Nama Penerbit Lain</label>
                <input type="text" name="custom_publisher_name" placeholder="Tambah Nama Penerbit" class="form-control">
                @error('custom_publisher_name')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="custom_publisher_year" class="form-label">Tahun terbit lain</label>
                <input type="text" name="custom_publisher_year" placeholder="Tambah Tahun Penerbitan"
                    class="form-control">
                @error('custom_publisher_year')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">Kota terbit lain</label>
                <input type="text" name="custom_publisher_city" placeholder="Tambah Kota Penerbitan"
                    class="form-control">
                @error('custom_publisher_city')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="grade_id" class="form-label">Kelas</label>
                <select name="grade_id" id="grade_id" class="form-select">
                    <option value="0">Tidak Ada Kelas</option>
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
                <label for="title" class="form-label">Judul</label>
                <input type="text" name="title" class="form-control">
                @error('title')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="description" class="form-label">Deskripsi</label>
                <input type="text" name="description" class="form-control">
                @error('description')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="image" class="form-label">Gambar/Foto</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" name="isbn" class="form-control">
                @error('isbn')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-success">Tambah</button>
            </div>
        </div>
    </form>
</div>
@endsection
