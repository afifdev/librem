<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('search_books', ['kind' => $kind])}}" method="POST">
        @csrf
        <input type="text" name="search" placeholder="Search...">search by
        <select name="search_by">
            <option value="code">code</option>
            <option value="title">title</option>
            <option value="writer">writer</option>
            <option value="isbn">isbn</option>
        </select>
        <br>
        <p>Filter</p>
        <select name="availability">
            <option value="all">all</option>
            <option value="terpinjam">terpinjam</option>
            <option value="tersedia">tersedia</option>
        </select>
        @if($kind === 'pelajaran')
            <select name="grade">
                <option value="all">all</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
        @endif
        <select name="course">
            <option value="all">all</option>
            @foreach ($categories as $category)
                <option value="{{$category->name}}">{{$category->name}}</option>
            @endforeach
        </select>
        <button type="submit">Submit</button>
    </form>
    <table>
        <tr>
            <th>No</th>
            <th>Code</th>
            <th>Title</th>
            <th>Avilability</th>
            @if($kind === 'pelajaran')
                <th>Class</th>
            @endif
            <th>Category</th>
            <th>Writer</th>
            <th>ISBN</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$book->code}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->availability === 1? 'tersedia' : 'terpinjam'}}</td>
                @if($kind === 'pelajaran')
                <td>{{$book->grade->level}}</td>
                @endif
                <td>{{$book->category->name}}</td>
                <td>{{$book->writer->name}}</td>
                <td>{{$book->isbn}}</td>
            </tr>    
        @endforeach
    </table>
</body>
</html>