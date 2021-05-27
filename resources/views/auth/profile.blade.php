@extends('layouts.app')
@section('title', 'Librem')
@section('header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
<title>{{$user[0]->user_name}}</title>
<link rel="stylesheet" href="{{asset('css/profile.css')}}">
<link rel="stylesheet" href="{{asset('css/navigation.css')}}">
@endsection
@section('content')
<div class="route-home-profile">
    <div class="container konten">
        <div class="row d-flex justify-content-between">
            <div class="col-md-9">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama Buku</th>
                            <th scope="col">Pustakawan</th>
                            <th scope="col">Tanggal Pinjam</th>
                            <th scope="col">Deadline Tanggal Kembali</th>
                            <th scope="col">Tanggal Kembali</th>
                            <th scope="col">Denda</th>
                            <th scope="col">Denda terbayar</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $s)
                        <tr>
                            <td>{{$s->title}}</td>
                            <td>{{$s->admin_name}}</td>
                            <td>{{$s->take_date}}</td>
                            <td>{{$s->due_date}}</td>
                            <td>{{$s->return_date}}</td>
                            <td>{{$s->penalty ? $s->penalty : '-'}}</td>
                            <td>{{$s->debt_collected ? $s->debt_collected : '-'}}</td>
                            @if ($s->status === 'borrowed')
                            <td>Dipinjam</td>
                            @elseif ($s->status === 'debt')
                            <td>Belum lunas</td>
                            @else
                            <td>Selesai</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Akhir tabel buku yang dipinjam -->

            <!-- Total Denda -->
            <div class="col-md-3">
                <div class="custom-box">
                    <h5>Total Denda</h5>
                    @php
                    $total = 0;
                    @endphp
                    @foreach ($user as $s)
                    @php
                    $total += $s->penalty - $s->debt_collected
                    @endphp
                    @endforeach
                    <p class="text-light fs-4">Rp {{$total}},00</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir semua konten -->

    <!-- Footer -->
    <footer class="background">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-md-6">
                    <p>Librem</p>
                    <p>Portal Perpustakaan Online Resmi</p>
                    <p>SMA Pelita Nusa</p>
                </div>
                <div class="col-md-6">
                    <p>SMA Pelita Nusa</p>
                    <p>JL. Pendidikan No 14 Kota Maju</p>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection