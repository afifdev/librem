<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}">
    <title>Teacher</title>
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
                    <th scope="col">NIP</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Born Date</th>
                    <th scope="col">Born Place</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $teachers as $teacher)
                <tr>
                    <th scope="row">{{$loop->index + 1}}</th>
                    <td>{{ $teacher->nip }}</td>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->gender }}</td>
                    <td>{{ $teacher->born_date }}</td>
                    <td>{{ $teacher->born_place }}</td>
                    <td><a href="{{ route('teacherEdit', $teacher->id) }}">Edit</a></td>
                    <td>
                        <form action="{{ route('teacherDelete', $teacher->id) }}" method="post">
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