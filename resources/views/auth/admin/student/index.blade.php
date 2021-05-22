@extends('layouts.admin.app')
@section('header')
<link rel="stylesheet" href="{{asset('css/admin/navigation.css')}}">
@endsection
@section('content')
<div class="container" style="margin-left: 40vh">
    @if(session()->has('success'))
    <p> {{ session()->get('success') }}</p>
    @endif
    <div class="mem-new py-4">
        <p>Student</p>
        <form action="{{route('student_search') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-10">
                    <input name="search" type="search" id="form1" class="form-control"
                        placeholder="Search for students ..." aria-label="Search" />
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>
    <a href="{{ route('student_register') }}" class="btn bg-primary text-light">Tambah Data Siswa</a>
    <div class="table-responsive py-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Tahun Masuk</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                <tr>
                    <th class="align-middle" scope="row">{{ $loop->index+1 }}</th>
                    <td class="align-middle">{{ $student->nis }}</td>
                    <td class="align-middle">{{ $student->name }}</td>
                    <td class="align-middle">{{ $student->start_year }}</td>
                    <td class="align-middle">
                        {{ $student->grade->level.' '.$student->major->name.' '.$student->major->level }}</td>
                    <td class="align-middle">{{ $student->graduated ? 'Lulus':'Aktif' }}</td>
                    <td class="align-middle">
                        <a href="{{ route('student_edit', $student->nis) }}" class="btn btn-success">Edit</a>
                    </td>
                    <td class="align-middle">
                        <form action="{{ route('student_delete', $student->nis) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                Tidak ada
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $students->links() }}
    </div>
    <div class="py-4">
    </div>
</div>

@endsection