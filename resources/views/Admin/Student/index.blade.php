@extends('layouts.app')

@section('customStyle')
<link href="{{ asset('css/nafis/dashStyle.css') }}" rel="stylesheet">
<link rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
@stop

@section('content' )
<header>
    @include('layouts.navigation')
</header>

<div class="container">
    @include('layouts.sidebar')
    <!-- content -->
    <div class="content">
        <div class="ad-mem">
            <div class="member-admin">
                <a href="{{ route('student') }}">Students</a>
                <a href="{{ route('teacher') }}">Teachers</a>
            </div>
            <div class="total-member">
                <p>Total Students : 120</p>
            </div>
        </div>
        <div class="mem-new">
            <p><i class="fas fa-user-friends"></i>Students</p>
        </div>
        <!-- tabel -->
        <div class="tabel-mem">
            <table class="styled-table2">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NIS</th>
                        <th>PASS</th>
                        <th width="60">NAME</th>
                        <th>GENDER</th>
                        <th>BORN DATE</th>
                        <th>BORN PLACE</th>
                        <th>ADRESS</th>
                        <th>PHONE</th>
                        <th>START YEAR</th>
                        <th>GRADE ID</th>
                        <th>CLASS ID</th>
                        <th>STATUS</th>
                        <th colspan="2" class="col">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>1234567890123</td>
                        <td>akudewe</td>
                        <td>Durrotun Nafisah</td>
                        <td>L</td>
                        <td>12-04-2001</td>
                        <td>Mojosari</td>
                        <td>Jl 03 Mojosari</td>
                        <td>085230796877</td>
                        <td>2016</td>
                        <td>2018</td>
                        <td>MIPA 3</td>
                        <td>Terdaftar</td>
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
                    <a href="{{ route('studentRegister') }}">Tambah</a>
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
