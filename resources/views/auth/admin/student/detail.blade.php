<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Siswa</title>
</head>

<body>
    <p>NIS {{$student->nis}}</p>
    <p>Nama {{$student->name}}</p>
    <p>Gender {{$student->gender === 1 ? 'Perempuan' : 'Laki-laki'}}</p>
    <p>TTL {{$student->born_place.', '.$student->born_date}}</p>
    <p>Alamat {{$student->address}}</p>
    <p>Nomer Hape {{$student->phone_number}}</p>
    <p>Tahun masuk {{$student->date_in}}</p>
    <p>Kelas {{$student->grade->level.' '.$student->major->name.' '.$student->major->level}}</p>
</body>

</html>