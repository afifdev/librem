@if(session()->has('success'))
<p> {{ session()->get('success') }}</p>
@endif
<form action=" {{ route('teacherStore') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')

    <label for="nip">NIP :</label>
    <input type="text" name="nip" maxlength="18">
    @if ($errors->has('nip'))
    <span class="text-danger">{{ $errors->first('nip') }}</span>
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

    <label for="phone">Phone:</label>
    <input type="text" name="phone">
    @if ($errors->has('phone'))
    <span class="text-danger">{{ $errors->first('phone') }}</span>
    @endif
    <br>

    <button type="submit">Tambah</button>
</form>
