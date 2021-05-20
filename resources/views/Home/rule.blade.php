@extends('layouts.user.app')

@section('title', 'Tata Tertib')

@section('header')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />

<!-- My CSS -->
<link rel="stylesheet" href="{{ asset('css/home/tatatertib.css') }}" />
@endsection

@section('content')
<!-- Tata Tertib -->
<div class="container konten custom-box">
    <h2>Tata Tertib</h2>
    <hr>
    <ul>
        <li>Layanan peminjaman offline buku tersedia pada saat jam kerja</li>
        <li>Dilarang makan dan minum di perpustakaan</li>
        <li>Dilarang berbuat gaduh di perpustakaan</li>
        <li>Batas waktu pengembalian buku untuk siswa adalah 3 hari</li>
        <li>Pengembalian yang melebihi batas waktu akan dikenakan denda 1000/hari</li>
        <li>Peminjam buku diharapkan menjaga buku dengan baik</li>
        <li>Peminjam buku kan dikenakan sanksi atas kerusakan dan kehilangan buku</li>
    </ul>
</div>
<!-- Akhir Tata Tertib -->

<!-- Footer -->
<footer class="background d-flex justify-content-around">
    <div class="kiri">
        <p>Librem</p>
        <p>Portal Perpustakaan Online Resmi</p>
        <p>SMA Pelita Nusa</p>
    </div>

    <div class="kanan">
        <p>SMA Pelita Nusa</p>
        <p>JL. Pendidikan No 14 Kota Maju</p>
    </div>
</footer>

<!-- Akhir Footer -->

@stop
