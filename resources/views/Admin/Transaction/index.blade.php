<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('trans_search')}}" method="POST">
        @method('post')
        @csrf
        <p>Search</p>
        <input type="search" name="search">
        <select name="search_by">
            <option value="transaction_code">Transaction Code</option>
            <option value="book_title">Book Title</option>
            <option value="user">User</option>
            <option value="librarian">Librarian</option>
        </select>
        <p>Sort by</p>
        <select name="status">
            <option value="status">status</option>
            <option value="borrowed">borrowed</option>
            <option value="debt">debt</option>
            <option value="done">done</option>
        </select>
        <br>
        <button type="submit">Search</button>
    </form>
    <table>
        <tr>
            <th>No</th>
            <th>Transaction Code</th>
            <th>Book</th>
            <th>User</th>
            <th>Librarian</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$transaction->id}}</td>
                <td>{{$transaction->title}}</td>
                <td>{{$transaction->student_name}}</td>
                <td>{{$transaction->teacher_name}}</td>
                <td>{{$transaction->status}}</td>
                <td><a href="{{route('trans_show', ['id' => $transaction->id])}}">view</a></td>
            </tr>
        @endforeach
    </table>
    <a href="{{route('trans_register')}}">Add New Book</a>
</body>
</html>