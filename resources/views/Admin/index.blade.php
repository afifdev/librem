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
            <div class="member-admin">
                <a href="index.html">Students</a>
                <a href="teachers.html">Teachers</a>
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
                    <tr>
                        <td>1</td>
                        <td>1234567890123</td>
                        <td>Durrotun Nafisah</td>
                        <td>2016</td>
                        <td>MIPA 3</td>
                        <td>2019</td>
                        <td colspan="2" class="col">
                            <a href="ubahStudent.html" class="edit"><i class="fas fa-edit"></i></a>
                            <a href="" class="del"><i class="fas fa-trash-alt bg-danger p-2"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- end tabel -->
            <!-- Pagination  -->
            <div class="foot">
                <div class="button">
                    <a href="tambahStudent.html">Tambah</a>
                    <a href="">Delete</a>
                </div>
                <div class="page">
                    <a href="" class="page-link">&laquo;</a>
                    <a href="" class="page-link">1</a>
                    <a href="" class="page-link">&raquo;</a>
                </div>
            </div>
            <!-- End Pagination  -->
        </div>
    </div>
    <!-- End Content -->
</div>
@endsection
