@extends('layouts.admin.app')
@section('header')
<title>Transaksi</title>
<link rel="stylesheet" href="{{asset('css/admin/navigation.css')}}">
@endsection
@section('content')
<div class="container" style="margin-left: 40vh">

    @if(session()->has('success'))
    <div class="alert alert-success mt-4">
        {{ session()->get('success') }}
    </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-danger mt-4">
        {{ session()->get('error') }}
    </div>
    @endif

    <div class="mem-new py-4">
        <form action="{{route('trans_search')}}" method="POST">
            @method('post')
            @csrf
            <p>Transaksi</p>
            <div class="row">
                <div class="col-10">
                    <input type="search" name="search" class="form-control">
                </div>
                <div class="col-auto">
                    <select name="search_by" class="form-select">
                        <option value="transaction_code">Kode Transaksi</option>
                    </select>
                </div>
            </div>
            <br>
            <p>Sort by</p>
            <div class="row">
                <div class="col-auto">
                    <select name="status" class="form-select">
                        <option value="status">Status</option>
                        <option value="borrowed">Terpinjam</option>
                        <option value="debt">Hutang</option>
                        <option value="done">Lunas</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
            </div>
            <br>
        </form>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Transaksi</th>
                    <th scope="col">Buku</th>
                    <th scope="col">Peminjam</th>
                    <th scope="col">Pustakawan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
                @foreach ($transactions as $transaction)
                <tr>
                    <td class="align-middle" scope="row">{{$loop->index+1}}</td>
                    <td class="align-middle">{{$transaction->id}}</td>
                    <td class="align-middle">{{$transaction->book ? $transaction->book->title : $transaction->book}}
                    </td>
                    <td class="align-middle">
                        {{$transaction->student ? $transaction->student->name:$transaction->teacher->name}}</td>
                    <td class="align-middle">{{$transaction->admin->name}}</td>
                    <td class="align-middle">{{$transaction->status}}</td>
                    <td class="align-middle"><a href="{{route('trans_show', ['id' => $transaction->id])}}"
                            class="btn bg-primary text-light">view</a></td>
                </tr>
                @endforeach
            </table>
        </div>
        <a href="{{route('trans_register')}}" class="btn btn-success">Tambah transaksi</a>
    </div>
</div>
@endsection
