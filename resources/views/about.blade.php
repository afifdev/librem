@extends('layouts.app')

@section('title', 'About')

@section('header')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('css/navigation.css')}}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}" />
@endsection
@section('content')
    <div class="route-home-about">
        <div style="position:relative; min-height:67vh;">
            <div class="container konten custom-box">
                <h2>Librem (Perpustakaan Online SMA Pelita Nusa)</h2>
                <hr />
                <p>Librem adalah portal perpustakaan online milik SMA Pelita Nusa yang memudahkan siswa dan guru untuk melihat
                    daftar stok buku, daftar buku yang telah dipinjam, informasi mengenai pengembalian dan denda</p>
                <p>Dengan adanya librem, siswa ataupun pustakawan tak perlu lagi kesusahan dalam menghitung denda dari buku yang
                    dipinjam. Pustakawan juga akan lebih mudah dalam mengelola data buku</p>
            </div>
            <!-- Akhir perpus librem -->
            <!-- Fitur-fitur -->
            <div class="container custom-box">
                <h2>Fitur-Fitur</h2>
                <hr />
                <h3>Fitur untuk pengguna</h3>
                <ul>
                    <li>Cek ketersediaan stok buku berdasarkan kategori</li>
                    <li>Mencari buku</li>
                    <li>Melihat Informasi buku yang dipinjam</li>
                    <li>Melihat informasi tanggal pengembalian</li>
                    <li>Melihat informasi denda</li>
                </ul>
                <h3>Fitur untuk pustakawan</h3>
                <ul>
                    <li>Mengelola data pengguna</li>
                    <li>Mengelola data stok buku</li>
                    <li>Mengetahui data-data buku yang dipinjam</li>
                    <li>Mengelola status buku</li>
                </ul>
            </div>
            <!-- Akhir Fitur-fitur -->
    
            <!-- Alur Peminjaman Buku -->
            <div class="container custom-box">
                <h2>Alur Peminjaman Buku</h2>
                <hr />
                <ol>
                    <li>Peminjam melihat stok ketersediaan buku melalui web</li>
                    <li>Jika buku tersedia, peminjam dapat langsung menuju perpustakaan untuk meminjam buku</li>
                    <li>Peminjam menunjukkan buku kepada pustakawan</li>
                    <li>Pustakawan memasukan data buku yang dipinjam melalui halaman admin web</li>
                    <li>Peminjam dapat melihat data buku yang telah dipinjam melalui website beserta tanggal pengembalian dan
                        denda
                    </li>
                </ol>
            </div>
            <!-- Akhir Alur Peminjaman buku -->
    
    
    
        </div>
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
    </div>
@endsection
