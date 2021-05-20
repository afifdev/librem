<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>{{$user[0]->user_name}}</p>
    <p>{{$user[0]->user_number}}</p>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tenggat Waktu</th>
            <th>Tanggal kembali</th>
            <th>Denda</th>
            <th>Denda terbayar</th>
            <th>Status</th>
        </tr>
        @foreach ($user as $s)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$s->title}}</td>
                <td>{{$s->take_date}}</td>
                <td>{{$s->due_date}}</td>
                <td>{{$s->return_date ? $s->return_date : '-'}}</td>
                <td>{{$s->penalty ? $s->penalty : '-'}}</td>
                <td>{{$s->debt_collected ? $s->debt_collected : '-'}}</td>
                <td>{{$s->status}}</td>
            </tr>
        @endforeach
    </table>
    <h1>denda</h1>
    <table>
        <tr>
            <th>No</th>
            <th>Denda</th>
        </tr>
        @php
            $total_penalty = null;
            $looping = 1;
        @endphp
        @foreach ($user as $s)
            @if ($s->status === 'debt' && (!$s->debt_collected || $s->debt_collected !== $s->penalty))
                <tr>
                    <td>{{$looping}}</td>
                    <td>{{!$s->debt_collected ? 0 : $s->penalty - $s->debt_collected}}</td>
                </tr>
                @php
                    $total_penalty += $s->penalty-$s->debt_collected;
                    $looping += 1;
                @endphp
            @endif
        @endforeach
        <tr>
            <td>Total denda</td>
            <td>{{$total_penalty}}</td>
        </tr>
    </table>
</body>
</html>