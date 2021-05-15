@extends('layouts.app')

@section('customStyle')
<link href="{{ asset('css/nafis/dashStyle.css') }}" rel="stylesheet">
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
    @include('layouts.sidebar')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in! ADMIN') }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
