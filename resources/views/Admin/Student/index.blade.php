<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Student</title>
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
                    <th scope="col">NIS</th>
                    <th scope="col">Name</th>
                    <th scope="col">Tahun Masuk</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Graduated</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $students as $student)
                <tr>
                    <th scope="row">{{$loop->index + 1}}</th>
                    <td>{{ $student->nis }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->start_year }}</td>
                    <td>
                        {{ $student->grade->level.' '.$student->major->name.' '. $student->major->level }}
                    </td>
                    <td>{{ $student->graduated }}</td>
                    <td><a href="{{ route('studentEdit', $student->id) }}">Edit</a></td>
                    <td>
                        <form action="{{ route('studentDelete', $student->id) }}" method="post">
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
