@extends('layouts.admin.app')
@section('header')
<link rel="stylesheet" href="{{asset('css/admin/navigation.css')}}">
@endsection


@section('content')
<div class="container" style="margin-left: 40vh">
    <h1>Rule</h1>
    <table>
        <tr>
            <th>#</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        @foreach ($rules as $rule)
        <tr>
            <td>{{$loop->index+1}}</td>
            <form action="{{route('rule_update',['id' => $rule->id])}}" method="POST">
                @method('put')
                @csrf
                <td><input type="text" value="{{$rule->desc}}" name="prev_rule"></td>
                <td>
                    <input type="submit" value="Update" name="update">
                    <input type="submit" value="Delete" name="delete">
                </td>
            </form>
        </tr>
        @endforeach
        <tr>
            <td>#</td>
            <form action="{{route('rule_register')}}" method="POST">
                @csrf
                <td><input type="text" name="new_rule"></td>
                <td><button type="submit">Create New</button></td>
            </form>
        </tr>
    </table>
</div>
@endsection
