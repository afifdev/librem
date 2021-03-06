@extends('layouts.admin.app')
@section('header')
<title>Tambah Siswa</title>
<link rel="stylesheet" href="{{asset('css/admin/navigation.css')}}">
@endsection
@section('content')
<div class="container" style="margin-left: 40vh">
    <form action=" {{ route('student_store') }}" method="post">
        @csrf
        @method('post')
        <div class="row g-3 py-4">
            <div class="col-md-4">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" name="nis" maxlength="18" class="form-control" value="{{ old('nis') }}">
                @error('nis')
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
                <select name="gender" id="gender" class="form-select">
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
                <label for="phone_number" class="form-label">Nomer Handphone</label>
                <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}">
                @error('phone_number')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="grade_id" class="form-label">Kelas</label>
                <select name="grade_id" class="form-select">
                    @forelse ($grades as $grade)
                    <option value="{{ $grade->id }}">{{ $grade->level }}</option>
                    @empty
                    <option value="">Kosong</option>
                    @endforelse
                </select>
                @error('grade_id')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="major_id" class="form-label">Jurusan</label>
                <select name="major_id" class="form-select">
                    @forelse ($majors as $major)
                    <option value="{{ $major->id }}">{{ $major->name.' '.$major->level }}</option>
                    @empty
                    <option value="">Kosong</option>
                    @endforelse
                </select>
                @error('major_id')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="address" class="form-label">Alamat</label>
                <textarea name="address" id="" cols="20" rows="3" class="form-control">{{ old('address') }}</textarea>
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
