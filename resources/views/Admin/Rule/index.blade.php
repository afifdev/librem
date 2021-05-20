<<<<<<< HEAD
Admin Rule
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Rule</h1>
    <table>
        <tr>
            <th>#</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        @foreach ($rules as $rule)
            <tr>
                <td>{{$loop->index+1}}</td>
                <form action="{{route('rule_update',['id' => $rule->id])}}" method="POST">
                    @method('put')
                    @csrf
                    <td><input type="text" value="{{$rule->desc}}" name="prev_rule"></td>
                    <td>
                        <input type="submit" value="Update" name="update">
                        <input type="submit" value="Delete" name="delete">
                    </td>
                </form>
            </tr>
        @endforeach
        <tr>
            <td>#</td>
            <form action="{{route('rule_register')}}" method="POST">
            @csrf
                <td><input type="text" name="new_rule"></td>
                <td><button type="submit">Create New</button></td>
            </form>
        </tr>
    </table>
</body>
</html>
>>>>>>> 87435a77a47a3be4a0ad813693256216127c8300
