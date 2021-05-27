@extends('layouts.admin.app')
@section('header')
<title>Edit Siswa</title>
<link rel="stylesheet" href="{{asset('css/admin/navigation.css')}}">
@endsection
@section('content')
<div class="container" style="margin-left: 40vh">
    <form action=" {{ route('student_update', $student->nis) }}" method="post" enctype="multipart/form-data"
        class="py-4">
        @csrf
        @method('patch')
        <div class="row g-3">
            <div class="col-md-4">
                <label for="currentpwd" class="form-label">Password Sekarang</label>
                <input type="password" name="currentpwd" class="form-control">
                @error('currentpwd')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="password" class="form-label">Password Baru (opsional)</label>
                <input type="password" name="password" class="form-control">
                @error('password')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="password_confirmation" class="form-label">Konfirmasi Password (opsional)</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Nama</label>
                <p class="form-control" readonly>{{$student->name}}</p>
            </div>
            <div class="col-md-4">
                <label class="form-label">NIS</label>
                <p class="form-control" readonly>{{$student->nis}}</p>
            </div>
            <div class="col-md-4">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" class="form-select">
                    @if ($student->gender)
                    <option value="0">Laki-laki</option>
                    <option value="1" selected>Perempuan</option>
                    @else
                    <option value="0">Laki-laki</option>
                    <option value="1">Perempuan</option>
                    @endif
                </select>
                @error('gender')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="born_place" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" name="born_place"
                    value="{{old('born_place')??$student->born_place}}">
                @error('born_place')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="born_date" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="born_date"
                    value="{{old('born_date')??$student->born_date}}">
                @error('born_date')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-12">
                <label for="address" class="form-label">Alamat</label>
                <textarea name="address" class="form-control" cols="20"
                    rows="3">{{old('address')??$student->address}}</textarea>
                @error('address')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="phone_number" class="form-label">Phone:</label>
                <input type="text" name="phone_number" class="form-control"
                    value="{{old('phone_number')??$student->phone_number}}">
                @error('phone_number')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">Tahun masuk</label>
                <p class="form-control" readonly>{{$student->start_year}}</p>
            </div>
            <div class="col-md-4">
                <label for="grade_id" class="form-label">Kelas</label>
                <select name="grade_id" class="form-select">
                    @foreach ($grades as $grade)
                    <option value="{{ $grade->id }}">{{ $grade->level }}</option>
                    @endforeach
                </select>
                @error('grade_id')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="major_id" class="form-label">Jurusan</label>
                <select name="major_id" class="form-select">
                    @foreach ($majors as $major)
                    <option value="{{ $major->id }}">{{ $major->name.' '.$major->level }}</option>
                    @endforeach
                </select>
                @error('major_id')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="graduated" class="form-label">Keterangan</label>
                <select name="graduated" class="form-select">
                    <option value="0">Aktif</option>
                    <option value="1">Sudah Lulus</option>
                </select>
                @error('graduated')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-success">Update!</button>
            </div>
        </div>
    </form>
    <form action="{{route('student_delete', $student->nis)}}" method="POST">
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
