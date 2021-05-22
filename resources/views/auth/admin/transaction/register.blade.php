@extends('layouts.admin.app')
@section('header')
<link rel="stylesheet" href="{{asset('css/admin/navigation.css')}}">
@endsection


@section('content')
<div class="container" style="margin-left: 40vh">
    @if (session()->has('error'))
    <p>{{session()->get('error')}}</p>
    @endif
    <form action="{{route('trans_create')}}" method="POST">
        @csrf
        <p>Book Code</p>
        <input type="text" name="book_code" id="book_code">
        <p>User number</p>
        <input type="number" name="user_number" id="student_nis">
        <select name="user">
            <option value="student">student</option>
            <option value="teacher">teacher</option>
        </select>
        <br>
        <p>Tipe</p>
        <select name="type">
            <option value="paket">paket</option>
            <option value="reguler">reguler</option>
        </select>
        <p>Date</p>
        <input type="date" name="due_date">
        <p>Detail</p>
        <input type="text" name="detail">
        <button type="submit">Submit</button>
    </form>
</div>
@endsection
