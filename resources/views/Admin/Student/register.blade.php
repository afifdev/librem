@extends('layouts.app')

@section('customStyle')
<link href="{{ asset('css/nafis/memStyle.css') }}" rel="stylesheet">
<link rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
@stop

@section('content')
<!-- Header -->
<header>
    @include('layouts.navigation')
</header>
<!-- End Header -->
<div class="container mt-5">
    <!-- sidebar -->
    @include('layouts.sidebar')
    <!-- End sidebar -->
    <!-- content -->
    <div class="content">
        <div class="mem-new">
            <p><i class="fas fa-user-friends"></i>Tambah Data Siswa</p>
        </div>
        <div class="myform2">
            <form action="">
                <div class="form-left">
                    <input type="number" name="NIS" id="NIS" placeholder="NIS STUDENT">
                    <br>
                    <input type="text" name="password" id="password" placeholder="PASSWORD">
                    <br>
                    <input type="text" name="name" id="name" placeholder="NAME">
                    <br>
                    <input type="text" name="gender" id="gender" placeholder="GENDER">
                    <br>
                    <input type="date" name="born_date" id="born_date" placeholder="BORN_DATE">
                    <br>
                    <input type="text" name="born_place" id="born_place" placeholder="BORN_PLACE">
                    <br>
                    <button type="submit">Tambah</button>
                    <button class="cancel"><a href="{{ route('student') }}">Cancel</a></button>
                </div>
                <div class="form-right">
                    <input type="text" name="address" id="adress" placeholder="ADDRESS">
                    <br>
                    <input type="number" name="phone" id="phone" placeholder="PHONE">
                    <br>
                    <input type="text" name="start_year" id="start_year" placeholder="START_YEAR">
                    <br>
                    <input type="text" name="grade_id" id="grade_id" placeholder="GREADE_ID">
                    <br>
                    <input type="text" name="class_id" id="class_id" placeholder="CLASS_ID">
                    <br>
                    <input type="text" name="status" id="status" placeholder="STATUS">
                    <br>
                </div>
            </form>
        </div>
        <!-- tabel -->
    </div>
    <!-- End Content -->
</div>
@stop
