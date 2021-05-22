<form action=" {{ route('student_update', $student->nis) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <p>NIS = {{$student->nis}}</p>
    <label for="currentpwd">Current Password</label>
    <input type="text" name="currentpwd">
    <br>
    <label for="password">Password:</label>
    <input type="text" name="password">
    <br>
    <label for="password_confirmation">Confirmation Password:</label>
    <input type="text" name="password_confirmation">
    <br>

    <label for="name">Name:</label>
    <input type="text" name="name" value="{{$student->name}}">
    @if ($errors->has('name'))
    <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
    <br>

    <label for="gender">Gender:</label>
    <select name="gender" id="gender">
        @if ($student->gender)
        <option value="0">Laki-laki</option>
        <option value="1" selected>Perempuan</option>
        @else
        <option value="0">Laki-laki</option>
        <option value="1">Perempuan</option>
        @endif
    </select>
    @if ($errors->has('gender'))
    <span class="text-danger">{{ $errors->first('gender') }}</span>
    @endif
    <br>

    <label for="born_date">Born Date:</label>
    <input type="date" name="born_date" value="{{$student->born_date}}">
    @if ($errors->has('born_date'))
    <span class="text-danger">{{ $errors->first('born_date') }}</span>
    @endif
    <br>

    <label for="born_place">Born Place:</label>
    <input type="text" name="born_place" value="{{$student->born_place}}">
    @if ($errors->has('born_place'))
    <span class="text-danger">{{ $errors->first('born_place') }}</span>
    @endif
    <br>

    <label for="address">Address:</label>
    <textarea name="address" id="" cols="20" rows="3">{{$student->address}}</textarea>
    @if ($errors->has('address'))
    <span class="text-danger">{{ $errors->first('address') }}</span>
    @endif
    <br>

    <label for="phone_number">Phone:</label>
    <input type="text" name="phone_number" value="{{$student->phone_number}}">
    @if ($errors->has('phone_number'))
    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
    @endif
    <p>Tahun masuk = {{$student->start_year}}</p>
    @if ($errors->has('start_year'))
    <span class="text-danger">{{ $errors->first('start_year') }}</span>
    @endif
    <br>

    <label for="grade_id">Kelas:</label>
    <select name="grade_id">
        @foreach ($grades as $grade)
        <option value="{{ $grade->id }}">{{ $grade->level }}</option>
        @endforeach
    </select>
    @if ($errors->has('grade_id'))
    <span class="text-danger">{{ $errors->first('grade_id') }}</span>
    @endif
    <br>

    <label for="major_id">Kelas:</label>
    <select name="major_id">
        @foreach ($majors as $major)
        <option value="{{ $major->id }}">{{ $major->name.' '.$major->level }}</option>
        @endforeach
    </select>
    @if ($errors->has('major_id'))
    <span class="text-danger">{{ $errors->first('major_id') }}</span>
    @endif
    <br>

    <label for="graduated">Keterangan:</label>
    <select name="graduated">
        <option value="0">Aktif</option>
        <option value="1">Sudah Lulus</option>
    </select>
    @if ($errors->has('graduated'))
    <span class="text-danger">{{ $errors->first('graduated') }}</span>
    @endif
    <br>

    <button type="submit">Edit</button>
</form>
<form action="{{route('student_delete', $student->nis)}}" method="POST">
    @method('delete')
    @csrf
    <button type="submit">Delete</button>
</form>