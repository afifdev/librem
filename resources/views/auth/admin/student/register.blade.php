<form action=" {{ route('student_store') }}" method="post">
    @csrf
    @method('post')

    <label for="nis">NIS :</label>
    <input type="text" name="nis" maxlength="18">
    @if ($errors->has('nis'))
    <span class="text-danger">{{ $errors->first('nis') }}</span>
    @endif
    <br>

    <label for="password">Password:</label>
    <input type="text" name="password">
    @if ($errors->has('password'))
    <span class="text-danger">{{ $errors->first('password') }}</span>
    @endif
    <br>

    <label for="password_confirmation">Confirmation Password:</label>
    <input type="text" name="password_confirmation">
    @if ($errors->has('password_confirmation'))
    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
    @endif
    <br>

    <label for="name">Name:</label>
    <input type="text" name="name">
    @if ($errors->has('name'))
    <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
    <br>

    <label for="gender">Gender:</label>
    <select name="gender" id="gender">
        <option value="0">Laki-laki</option>
        <option value="1">Perempuan</option>
    </select>
    @if ($errors->has('gender'))
    <span class="text-danger">{{ $errors->first('gender') }}</span>
    @endif
    <br>

    <label for="born_date">Born Date:</label>
    <input type="date" name="born_date">
    @if ($errors->has('born_date'))
    <span class="text-danger">{{ $errors->first('born_date') }}</span>
    @endif
    <br>

    <label for="born_place">Born Place:</label>
    <input type="text" name="born_place">
    @if ($errors->has('born_place'))
    <span class="text-danger">{{ $errors->first('born_place') }}</span>
    @endif
    <br>

    <label for="address">Address:</label>
    <textarea name="address" id="" cols="20" rows="3"></textarea>
    @if ($errors->has('address'))
    <span class="text-danger">{{ $errors->first('address') }}</span>
    @endif
    <br>

    <label for="phone_number">Phone:</label>
    <input type="text" name="phone_number">
    @if ($errors->has('phone_number'))
    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
    @endif
    <br>

    <label for="start_year">Tahun Masuk:</label>
    <select name="start_year">
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
    </select>
    @if ($errors->has('start_year'))
    <span class="text-danger">{{ $errors->first('start_year') }}</span>
    @endif
    <br>

    <label for="grade_id">Kelas:</label>
    <select name="grade_id">
        @forelse ($grades as $grade)
        <option value="{{ $grade->id }}">{{ $grade->level }}</option>
        @empty
        <option value="">Kosong</option>
        @endforelse
    </select>
    @if ($errors->has('grade_id'))
    <span class="text-danger">{{ $errors->first('grade_id') }}</span>
    @endif
    <br>

    <label for="major_id">Kelas:</label>
    <select name="major_id">
        @forelse ($majors as $major)
        <option value="{{ $major->id }}">{{ $major->name.' '.$major->level }}</option>
        @empty
        <option value="">Kosong</option>
        @endforelse
    </select>
    @if ($errors->has('major_id'))
    <span class="text-danger">{{ $errors->first('major_id') }}</span>
    @endif
    <br>

    {{-- HIDDEN GRADUATED --}}

    <input type="text" name="graduated" value="0" hidden>
    <button type="submit">Tambah</button>
</form>
