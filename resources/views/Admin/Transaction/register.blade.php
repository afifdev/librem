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
    <form action="{{route('trans_create')}}" method="POST">
        @csrf
        <p>Book Code</p>
        <input type="text" name="book_code" id="book_code">
        <p>Student NIS</p>
        <input type="number" name="student_nis" id="student_nis">
        <p>Teacher NIP</p>
        <input type="number" name="teacher_nip" id="teacher_nip">
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
</body>
</html>