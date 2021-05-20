@extends('layouts.user.app')

@section('title', 'Librem')

@section('header')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />

<!-- My CSS -->
<link rel="stylesheet" href="{{ asset('css/home/style.css') }}" />
@endsection


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
        @forelse ($kinds as $kind)
        <!-- Pelajaran -->
        <div class="col-md-4">
            <a href="{{ route('show_books', $kind->name) }}">
                <img class="mx-auto d-block" src="{{ asset($pathImage.$kind->name.'.png') }}" alt="Pelajaran" />
                <h5 class="text-center">{{ $kind->name }}</h5>
            </a>
        </div>
        <!-- Akhir pelajaran -->
        @empty
        <div class="col-md-4">
            Tidak ada data
        </div>
        @endforelse

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

@stop
