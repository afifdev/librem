@extends('layouts.admin.app')
@section('header')
<title>Guru</title>
<link rel="stylesheet" href="{{asset('css/admin/navigation.css')}}">
@endsection
@section('content')
<div class="container" style="margin-left: 40vh">
    @if(session()->has('success'))
    <p> {{ session()->get('success') }}</p>
    @endif
    <div class="mem-new py-4">
        <p><i class="fas fa-user-friends"></i>Teacher</p>
        <form action="{{route('teacher_search') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-10">
                    <input name="search" type="search" id="form1" class="form-control"
                        placeholder="Search for Teachers ..." aria-label="Search" />
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>
    <a href="{{ route('teacher_register') }}" class="btn bg-primary text-light">Tambah Data Guru</a>
    <div class="table-responsive py-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $teachers as $teacher)
                <tr>
                    <th class="align-middle" scope="row">{{$loop->index + 1}}</th>
                    <td class="align-middle">{{ $teacher->nip }}</td>
                    <td class="align-middle">{{ $teacher->name }}</td>
                    <td class="align-middle">{{ $teacher->gender ? 'Perempuan' : 'Laki-laki' }}</td>
                    <td class="align-middle">{{ $teacher->born_place }}</td>
                    <td class="align-middle">{{ $teacher->born_date }}</td>
                    <td class="align-middle"><a href="{{ route('teacher_edit', $teacher->nip) }}"
                            class="btn btn-success">Edit</a></td>
                    <td class="align-middle">
                        <form action="{{ route('teacher_delete', $teacher->nip) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                Tidak ada data
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $teachers->links() }}
    </div>
    <div class="py-4"></div>
</div>
@endsection