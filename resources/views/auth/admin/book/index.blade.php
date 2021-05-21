<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        @if(session()->has('success'))
        <p> {{ session()->get('success') }}</p>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Code</th>
                    <th scope="col">Kind</th>
                    <th scope="col">Category</th>
                    <th scope="col">Writer</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Title</th>
                    <th scope="col">Availability</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $books as $book)
                <tr>
                    <th scope="row">{{$loop->index + 1}}</th>
                    <td>{{ $book->code }}</td>
                    <td>{{ $book->kind->name }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>{{ $book->writer->name }}</td>
                    <td>{{ $book->publisher->name }}</td>
                    @if ($book->grade)
                    <td>{{ $book->grade->level }}</td>
                    @else
                    <td> - </td>
                    @endif
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->availability }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td><a href="{{ route('book_edit', $book->id) }}">Edit</a></td>
                    <td>
                        <form action="{{ route('book_delete', $book->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                Tidak ada data
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>
