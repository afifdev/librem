@extends('layouts.admin.app')
@section('header')

<link rel="stylesheet" href="{{ asset('css/admin/dashStyle.css') }}">
@endsection

@section('content')

<div class="container">
    @include('layouts.admin.sidebar')
    <!-- content -->
    <div class="content">
        <div class="ad-mem">
            <div class="member-admin" style="color: black">
                <a class="" href="{{ route('student') }}">Students</a>
                <a href=" {{ route('teacher') }}">Teachers</a>
            </div>
            <div class="total-member">
                <p>Total Students : 120</p>
            </div>
        </div>
        <div class="mem-new">
            <p><i class="fas fa-user-friends"></i>Students</p>
            <form class="search">
                <input type="text" name="search" placeholder="search...">
                <button class="btn-search">search</button>
            </form>
        </div>
        <!-- tabel -->
        @if(session()->has('success'))
        <div class="message">
            <p>{{  session()->get('success') }} </p>
        </div>
        @endif
        <div class="tabel-mem">
            <table class="styled-table2">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIS</th>
                        <th>NAME</th>
                        <th>TAHUN MASUK</th>
                        <th>KELAS</th>
                        <th>GRADUATED</th>
                        <th colspan="2" class="col">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)

                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $student->nis }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->start_year }}</td>
                        <td>
                            {{ $student->grade->level.' '.$student->major->name.' '. $student->major->level }}
                        </td>
                        <td>{{ $student->graduated }}</td>
                        <td colspan="2" class="col">
                            <a href="{{ route('student_edit', $student->id) }}" class="edit"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ route('student_delete', $student->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="del"><i class="fas fa-trash-alt p-2"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    Data Kosong
                    @endforelse
                </tbody>
            </table>


            <!-- end tabel -->
            <!-- Pagination  -->
            <div class="foot">
                <div class="button">
                    <a href="{{ route('student_register') }}">Tambah Data Siswa</a>
                </div>
                <div class="page">
                    <div>
                        {{ $students->links() }}
                    </div>
                </div>
                <!-- End Pagination  -->
            </div>
        </div>
        <!-- End Content -->
    </div>
    @endsection
