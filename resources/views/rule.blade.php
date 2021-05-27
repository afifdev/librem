@extends('layouts.app')

@section('title', 'Tata Tertib')

@section('header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
<title>Tata Tertib</title>
<link rel="stylesheet" href="{{ asset('css/navigation.css') }}" />
<link rel="stylesheet" href="{{ asset('css/about.css') }}" />
@endsection
@section('content')
<div class="route-home-about">
    <div class="container konten custom-box">
        <h2>Tata Tertib</h2>
        <hr>
        <ul>
            @foreach ($rules as $rule)
            <li>{{$rule->desc}}</li>
            @endforeach
        </ul>
    </div>
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
@stop