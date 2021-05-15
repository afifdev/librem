@extends('layouts/app')


@section('content')

<!-- Selamat Datang -->
<div class="container hero">
    <h1 class="text-center">Selamat Datang di Portal Perpustakaan “Librem” SMA Pelita Nusa</h1>
    <img class="mx-auto d-block" src="{{ asset($pathImage.'landpage.png') }}" alt="Perpus Librem" />
</div>
<!-- Akhir Selamat Datang -->

<!-- Kategori -->
<div class="container kategori">
    <div class="row judul">
        <h2 class="text-center">Kategori Buku</h2>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 d-flex justify-content-between">
        <!-- Pelajaran -->
        <div class="col-md-4">
            <a href="pelajaran.html">
                <img class="mx-auto d-block" src="{{ asset($pathImage.'pelajaran.png') }}" alt="Pelajaran" />
                <h5 class="text-center">Pelajaran</h5>
            </a>
        </div>
        <!-- Akhir pelajaran -->

        <!-- Fiksi -->
        <div class="col-md-4">
            <a href="fiksi.html">
                <img class="mx-auto d-block" src="{{ asset($pathImage.'fiksi.png') }}" alt="Fiksi" />
                <h5 class="text-center">Fiksi</h5>
            </a>
        </div>
        <!-- Akhir Fiksi -->

        <!-- Non fiksi -->
        <div class="col-md-4">
            <a href="nonfiksi.html"><img class="mx-auto d-block" src="{{ asset($pathImage.'nonfiksi.png') }}"
                    alt="Non-Fiksi" />
                <h5 class="text-center">Non-Fiksi</h5>
            </a>
        </div>
        <!-- Akhir Non FIksi -->

        <!-- Majalah -->
        <div class="col-md-4">
            <a href="majalah.html">
                <img class="mx-auto d-block" src="{{ asset($pathImage.'majalah.png') }}" alt="Majalah" />
                <h5 class="text-center">Majalah</h5>
            </a>
        </div>

        <!-- Akhir Majalah -->

        <!-- Kamus -->
        <div class="col-md-4">
            <a href="kamus.html"><img class="mx-auto d-block" src="{{ asset($pathImage.'kamus.png') }}" alt="kamus" />
                <h5 class="text-center">Kamus</h5>
            </a>
        </div>
        <!-- Akhir Kamus -->

        <!-- Lainnya -->
        <div class="col-md-center">
            <a href="lainnya.html">
                <img class="mx-auto d-block" src="{{ asset($pathImage.'lainnya.png') }}" alt="Lainnya" />
                <h5 class="text-center">Lainnya</h5>
            </a>
        </div>
        <!-- Akhir Lainnya -->
    </div>
</div>
<!-- Akhir Kategori -->

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

@stop()
