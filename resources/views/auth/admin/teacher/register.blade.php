@extends('layouts.admin.app')
@section('header')
<title>Tambah Guru</title>
<link rel="stylesheet" href="{{asset('css/admin/navigation.css')}}">
@endsection
@section('content')
<div class="container" style="margin-left: 40vh;">
    <form action=" {{ route('teacher_store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="row g-3 py-4">
            <div class="col-md-4">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" name="nip" maxlength="18" class="form-control" value="{{ old('nip') }}">
                @error('nip')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
                @error('password')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @error('name')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" class="form-select">
                    <option value="0">Laki-laki</option>
                    <option value="1">Perempuan</option>
                </select>
                @error('gender')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="born_place" class="form-label">Tempat Lahir</label>
                <input type="text" name="born_place" class="form-control" value="{{ old('born_place') }}">
                @error('born_place')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="born_date" class="form-label">Tanggal Lahir</label>
                <input type="date" name="born_date" class="form-control" value="{{ old('born_date') }}">
                @error('born_date')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                @error('phone')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="address" class="form-label">Alamat</label>
                <textarea name="address" cols="20" rows="3" class="form-control">{{ old('address') }}</textarea>
                @error('address')
                <div class="mt-2 text-danger">
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
