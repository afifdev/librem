<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if (session()->has('error'))
    <p>{{session()->get('error')}}</p>
    @endif
    <form action="{{route('trans_update', ['id' => $transaction->id])}}" method="POST">
        @method('put')
        @csrf
        <p>Book Code</p>
        <p>{{$transaction->book_code}}</p>
        <p>User Number</p>
        <p>{{$transaction->student->nis ? $transaction->student->nis:$transaction->teacher->nip}}</p>
        <p>Tipe</p>
        <p>{{$transaction->detail->type}}</p>
        <p>Take Date</p>
        <p>{{$transaction->detail->take_date}}</p>
        <p>Due Date</p>
        <p>{{$transaction->detail->due_date}}</p>
        <p>Return date</p>
        @if (!$transaction->detail->return_date)
        <input type="date" name="return_date">
        @else
        <p>{{$transaction->detail->return_date}}</p>
        @endif
        <p>Penalty</p>
        @if(!$transaction->detail->penalty)
        <p>0</p>
        @else
        <p>{{$transaction->detail->penalty}}</p>
        @endif
        <p>Uang yang sudah dibayar</p>
        @if(!$transaction->detail->penalty)
        <p>0</p>
        @else
        @if ($transaction->detail->penalty === $transaction->detail->debt_collected)
        <p>{{$transaction->detail->debt_collected}}</p>
        @else
        <input type="text" name="debt_collected" value="{{$transaction->detail->debt_collected}}">
        @endif
        @endif
        <p>Detail</p>
        <p>{{$transaction->detail->detail}}</p>
        <br><br>
        <button type="submit">Update</button>
    </form>
    <br>
    <form action="{{route('trans_delete', ['id' => $transaction->id])}}" method="POST">
        @method('delete')
        @csrf
        <button type="submit">Delete</button>
    </form>
</body>

</html>
