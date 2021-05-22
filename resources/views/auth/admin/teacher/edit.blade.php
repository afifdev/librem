@extends('layouts.admin.app')
@section('header')
<link rel="stylesheet" href="{{asset('css/admin/navigation.css')}}">
@endsection


@section('content')
<div class="container" style="margin-left: 40vh">

    <form action=" {{ route('teacher_update', $teacher->nip) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <p>NIP = {{$teacher->nip}}</p>
        <label for="currentpwd">Current Password</label>
        <input type="text" name="currentpwd">
        @if ($errors->has('currentpwd'))
        <span class="text-danger">{{ $errors->first('currentpwd') }}</span>
        @endif
        <br>

        <label for="password">Password:</label>
        <input type="text" name="password">
        @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
        <br>

        <label for="password_confirmation">Confirmation Password:</label>
        <input type="text" name="password_confirmation">
        <br>

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $teacher->name }}">
        @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
        <br>

        <label for="gender">Gender:</label>
        <select name="gender" id="gender">
            @if ($teacher->gender)
            <option value="0">Laki-laki</option>
            <option value="1" selected>Perempuan</option>
            @else
            <option value="0">Laki-laki</option>
            <option value="1">Perempuan</option>
            @endif
        </select>
        @if ($errors->has('gender'))
        <span class="text-danger">{{ $errors->first('gender') }}</span>
        @endif
        <br>

        <label for="born_date">Born Date:</label>
        <input type="date" name="born_date" value="{{ $teacher->born_date }}">
        @if ($errors->has('born_date'))
        <span class="text-danger">{{ $errors->first('born_date') }}</span>
        @endif
        <br>

        <label for="born_place">Born Place:</label>
        <input type="text" name="born_place" value="{{ $teacher->born_place }}">
        @if ($errors->has('born_place'))
        <span class="text-danger">{{ $errors->first('born_place') }}</span>
        @endif
        <br>

        <label for="address">Address:</label>
        <textarea name="address" id="" cols="20" rows="3">{{ $teacher->address }}</textarea>
        @if ($errors->has('address'))
        <span class="text-danger">{{ $errors->first('address') }}</span>
        @endif
        <br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="{{ $teacher->phone }}">
        @if ($errors->has('phone'))
        <span class="text-danger">{{ $errors->first('phone') }}</span>
        @endif
        <br>

        <button type="submit">Edit</button>
    </form>
</div>
@endsection
