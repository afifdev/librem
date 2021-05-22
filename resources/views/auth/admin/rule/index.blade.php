@extends('layouts.admin.app')
@section('header')
<link rel="stylesheet" href="{{asset('css/admin/navigation.css')}}">
@endsection


@section('content')
<div class="container py-4" style="margin-left: 40vh">
    <h1>Rule</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
            @foreach ($rules as $rule)
            <tr>
                <td>{{$loop->index+1}}</td>
                <form action="{{route('rule_update',['id' => $rule->id])}}" method="POST">
                    @method('put')
                    @csrf
                    <td><input type="text" value="{{$rule->desc}}" name="prev_rule" class="form-control"></td>
                    <td>
                        <input type="submit" value="Update" name="update" class="btn btn-success">
                        <input type="submit" value="Delete" name="delete" class="btn btn-danger">
                    </td>
                </form>
            </tr>
            @endforeach
            <tr>
                <td>#</td>
                <form action="{{route('rule_register')}}" method="POST">
                    @csrf
                    <td><input type="text" name="new_rule" class="form-control"></td>
                    <td><button type="submit" class="btn bg-primary text-light">Create New</button></td>
                </form>
            </tr>
        </table>
    </div>
</div>
@endsection