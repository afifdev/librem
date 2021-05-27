@extends('layouts.admin.app')
@section('header')
<title>Tambah Transaksi</title>
<link rel="stylesheet" href="{{asset('css/admin/navigation.css')}}">
@endsection


@section('content')
<div class="container" style="margin-left: 40vh">
    @if (session()->has('error'))
    <p>{{session()->get('error')}}</p>
    @endif
    <form action="{{route('trans_create')}}" method="POST">
        @csrf
        <div class="row g-3 py-4">
            <div class="col-md-12">
                <label for="book_code" class="form-label">Kode Buku</label>
                <input type="text" name="book_code" id="book_code" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="user_number" class="form-label">Kode User</label>
                <input type="number" name="user_number" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="user" class="form-label">Pilih User</label>
                <select name="user" class="form-select">
                    <option value="student">Siswa</option>
                    <option value="teacher">Guru</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="type" class="form-label">Tipe</label>
                <select name="type" class="form-select">
                    <option value="paket">paket</option>
                    <option value="reguler">reguler</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="due_date" class="form-label">Tenggat waktu</label>
                <input type="date" name="due_date" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="detail" class="form-label">Detail</label>
                <input type="text" name="detail" class="form-control">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection