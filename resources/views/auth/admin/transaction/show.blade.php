@extends('layouts.admin.app')
@section('header')
<link rel="stylesheet" href="{{asset('css/admin/navigation.css')}}">
@endsection
@section('content')
<div class="container" style="margin-left: 40vh">
    <div class="mem-new py-4">
        <form action="{{route('trans_update', ['id' => $transaction->id])}}" method="POST">
            @method('put')
            @csrf
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Kode Buku</label>
                    <p class="form-control" readonly>{{$transaction->book_code}}</p>
                </div>
                <div class="col-md-4">
                    <label class="form-label">User Number</label>
                    <p class="form-control" readonly>
                        {{$transaction->student->nis ? $transaction->student->nis:$transaction->teacher->nip}}</p>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Tipe</label>
                    <p class="form-control" readonly>{{$transaction->detail->type}}</p>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Take Date</label>
                    <p class="form-control" readonly>{{$transaction->detail->take_date}}</p>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Due Date</label>
                    <p class="form-control" readonly>{{$transaction->detail->due_date}}</p>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="return_date">Return date</label>
                    @if (!$transaction->detail->return_date)
                    <input type="date" name="return_date" class="form-control">
                    @else
                    <p class="form-control">{{$transaction->detail->return_date}}</p>
                    @endif
                </div>
                <div class="col-md-4">
                    <p class="form-label">Penalty</p>
                    @if(!$transaction->detail->penalty)
                    <p class="form-control" readonly>0</p>
                    @else
                    <p class="form-control" readonly>{{$transaction->detail->penalty}}</p>
                    @endif
                </div>
                <div class="col-md-4">
                    <p class="form-label">Uang yang sudah dibayar</p>
                    @if(!$transaction->detail->penalty)
                    <p class="form-control" readonly>0</p>
                    @elseif ($transaction->detail->penalty === $transaction->detail->debt_collected)
                    <p class="form-control" readonly>{{$transaction->detail->debt_collected}}</p>
                    @else
                    <input type="text" name="debt_collected" class="form-control"
                        value="{{$transaction->detail->debt_collected}}">
                    @endif
                </div>
                <div class="col-md-4">
                    <p class="form-label">Detail</p>
                    <p class="form-control">{{$transaction->detail->detail}}</p>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
        <br>
        <form action="{{route('trans_delete', ['id' => $transaction->id])}}" method="POST">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </body>

        </html>
    </div>
</div>
@endsection