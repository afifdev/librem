@extends('layouts.admin.app')
@section('header')
<link rel="stylesheet" href="{{asset('css/admin/navigation.css')}}">
@endsection
@section('content')
<div class="container" style="margin-left: 40vh">
    <form action=" {{ route('teacher_update', $teacher->nip) }}" method="post" enctype="multipart/form-data"
        class="py-4">
        @csrf
        @method('patch')
        <div class="row g-3">
            <div class="col-md-4">
                <label for="currentpwd" class="form-label">Current Password</label>
                <input type="text" name="currentpwd" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="password" class="form-label">Password (opsional)</label>
                <input type="text" name="password" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="password_confirmation" class="form-label">Confirmation Password (opsional)</label>
                <input type="text" name="password_confirmation" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Nama</label>
                <p class="form-control" readonly>{{$teacher->name}}</p>
            </div>
            <div class="col-md-4">
                <label class="form-label">NIS</label>
                <p class="form-control" readonly>{{$teacher->nip}}</p>
            </div>
            <div class="col-md-4">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" class="form-select">
                    @if ($teacher->gender)
                    <option value="0">Laki-laki</option>
                    <option value="1" selected>Perempuan</option>
                    @else
                    <option value="0">Laki-laki</option>
                    <option value="1">Perempuan</option>
                    @endif
                </select>
            </div>
            <div class="col-md-6">
                <label for="born_place" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" name="born_place" value="{{$teacher->born_place}}">
            </div>
            <div class="col-md-6">
                <label for="born_date" class="form-date">Tanggal Lahir</label>
                <input type="date" class="form-control" name="born_date" value="{{$teacher->born_date}}">
            </div>
            <div class="col-md-12">
                <label for="address" class="form-label">Alamat</label>
                <textarea name="address" class="form-control" cols="20" rows="3">{{$teacher->address}}</textarea>
            </div>
            <div class="col-md-12">
                <label for="phone_number" class="form-label">Phone:</label>
                <input type="text" name="phone_number" class="form-control" value="{{$teacher->phone}}">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-success">Update!</button>
            </div>
        </div>
    </form>
    <form action="{{route('teacher_delete', $teacher->nip)}}" method="POST">
        @method('delete')
        @csrf
        <div class="row g-3">
            <div class="col-md-3">
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </form>
</div>
@endsection