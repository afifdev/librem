@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">

                    <a href="{{ route('showSiswaRegisterForm') }}">Register Siswa</a>
                    <br>
                    <a href="{{ route('showGuruRegisterForm') }}">Register Guru</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
