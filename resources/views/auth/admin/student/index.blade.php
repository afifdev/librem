@extends('layouts.admin.app')
@section('header')
<link rel="stylesheet" href="{{asset('css/admin/navigation.css')}}">
@endsection


@section('content')
<div class="container" style="margin-left: 40vh">

    <div class="mem-new">
        <p><i class="fas fa-user-friends"></i>Teacher</p>
        <form action="{{route('student_search') }}" method="POST">
            @csrf
            <input name="search" type="search" id="form1" class="form-control" placeholder="Search for Teachers ..."
                aria-label="Search" />
            <button type="submit" class="btn btn-primary">Search for Name</button>
            <br><br>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>NIS</th>
                <th>NAME</th>
                <th>TAHUN MASUK</th>
                <th>KELAS</th>
                <th>STATUS</th>
                <th colspan="2">AKSI</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($students as $student)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $student->nis }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->start_year }}</td>
                <td>{{ $student->grade->level.' '.$student->major->name.' '.$student->major->level }}</td>
                <td>{{ $student->graduated ? 'Lulus':'Aktif' }}</td>
                <td>
                    <a href="{{ route('student_edit', $student->nis) }}">Edit</a>
                </td>
                <td>
                    <form action="{{ route('student_delete', $student->nis) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            Tidak ada
            @endforelse
        </tbody>
    </table>
    {{ $students->links() }}
    <a href="{{ route('student_register') }}">Tambah Data Siswa</a>
</div>

@endsection
