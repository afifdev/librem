@extends('layouts.admin.app')
@section('header')
<link rel="stylesheet" href="{{asset('css/admin/navigation.css')}}">
@endsection
@section('content')
<div class="container" style="margin-left: 40vh">
    <div class="row g-3 py-4">
        <div class="col-md-4">
            <label class="form-label">Kode</label>
            <p class="form-control">{{$book->code}}</p>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Tipe</label>
            <p class="form-control">{{$book->kind->name}}</p>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Kategori</label>
            <p class="form-control">{{$book->category->name}}</p>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Penulis</label>
            <p class="form-control">{{$book->writer->name}}</p>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Penerbit</label>
            <p class="form-control">{{$book->publisher->name.' '.$book->publisher->year.' '.$book->publisher->city}}</p>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Kelas</label>
            <p class="form-control">{{$book->grade_id ? $book->grade->level : '-'}}</p>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Judul</label>
            <p class="form-control">{{$book->title}}</p>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">ISBN</label>
            <p class="form-control">{{$book->isbn}}</p>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Ketersediaan</label>
            <p class="form-control">{{$book->availability ? 'Tersedia' : 'Dipinjam'}}</p>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Deskripsi</label>
            <p class="form-control">{{$book->description}}</p>
        </div>
        {{-- <div class="col-md-4">
            <label for="" class="form-label">Gambar/Foto</label> --}}
        <p class="form-control"><img src="{{asset('/storage/'.$book->image)}}" alt=""
                style="width: 20rem; height:auto;">
        </p>
        {{-- </div> --}}
    </div>
</div>
@endsection