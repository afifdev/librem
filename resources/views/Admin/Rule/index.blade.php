@extends('layouts.app')

@section('customStyle')
<link href="{{ asset('css/nafis/tatatertib.css') }}" rel="stylesheet">
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
<div class="container">
    <!-- sidebar -->
    @include('layouts.sidebar')
    <!-- End sidebar -->
    <!-- content -->
    <div class="content">
        <div class="tata-tertib">
            <div class="etika">
                <h4>Etika Ketika Di Perpustakaan</h6>
                    <p>
                        <ul>
                            <li>Dilarang Berisik</li>
                            <li>Dilarang Makan</li>
                            <li>Kembalikan Buku yang Di Pinjam</li>
                            <li>Kembalikan Buku yang diambil sesuai tatanan semula</li>
                        </ul>
                    </p>
            </div>
            <div class="visi-misi">
                <h4>Visi</h4>
                <p>
                    <ul>
                        <li>Mewujudkan Perpustakaan sebagai wahana informasi dan menumbuhkan minat baca warga sekolah
                        </li>
                    </ul>
                </p>
                <h4>Misi</h4>
                <p>
                    <ul>
                        <li>Perpustakaan Sebagain Jantung pendidikan</li>
                        <li>Sebagai pusat baca</li>
                        <li>Perpustakaan sebagain tempat belajar yang nyaman dan menyenangkan</li>
                    </ul>
                </p>
            </div>
            <div class="tujuan">
                <h4>Tujuan</h4>
                <p>
                    <ul>
                        <li>Menunjang pelaksanaan program pendidikan seperti menanamkan atau membina minat siswa/i untuk
                            membangkitkan minat dalam membaca</li>
                    </ul>
                </p>
            </div>
        </div>
        <div class="denda">
            <h4>Denda</h4>
            <p>Telat 1 Hari : 1000</p>
            <p>Hilang : Sesuai Jenis Buku</p>
            <p>Sampul rusak : 2000</p>
        </div>
    </div>
    <!-- End Content -->
</div>
@stop
