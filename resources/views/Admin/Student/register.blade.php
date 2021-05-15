@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <!-- sidebar -->
    <div class="sidebar">
        <div class="link-sidebar">
            <ul>
                <li><a href="index.html"><span class="las la-users"></span>Users</a></li>
                <li><a href="../SeluruhBuku/index.html"><span class="las la-book-reader"></span>Books</a></li>
                <li><a href="../peminjam/index.html"><span class="las la-address-book"></span>Transactions</a></li>
                <li><a href="../tatatertib/index.html"><span class="las la-pencil-ruler"></span>Rules</a></li>
                <li><a href=""><span class="las la-sign-out-alt"></span>Log out</a></li>
            </ul>
        </div>
    </div>
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
                    <button class="cancel"><a href="index.html">Cancel</a></button>
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
