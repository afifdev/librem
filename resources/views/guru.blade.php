@extends('layouts.app')
{{-- @extends('layouts.auth') --}}
@php
$getAuthGuru = auth()->guard('guru')->user();
$getAuthAdmin = auth()->guard('admin')->user();
$getAuthSiswa = auth()->guard('siswa')->user();
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    Welcome Home
                    <h1>GURU {{ $getAuthGuru->nama }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
