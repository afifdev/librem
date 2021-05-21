<!DOCTYPE html>
<html>

<head>
    <title>Login User</title>
    <link rel="stylesheet" type="text/css" href="style/login.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="{{ asset('css/auth/login.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <img class="wave" src="img/back.png">
    <div class="container">
        <div class="judul">
            <h1>Perpustakaan</h1>
            <hr size="10px" width="60px">
            <p>SMA Pelita Nusa</p>
            <div class="but">
                <a href="index.html">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    &larr;
                </a>
            </div>
        </div>
        <div class="login-content">
            <form method="post" action="{{ route('postLogin') }}">
                @csrf
                <img src="img/librem2.png">
                <h3>Librem</h3><br>
                <div class="form-label-group">
                    <input type="text" name="username" class="form-control" placeholder="Username"
                        autocomplete="username" value="{{ old('username') }}">
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <br>
                <div class="form-label-group">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <br>
                <div class="form-label-group">
                    <select class="form-select" name="roles">
                        <option value="admin">Admin</option>
                        <option value="student">Siswa</option>
                        <option value="teacher">Guru</option>
                    </select>
                </div>
                <button class="btn btn-lg btn-success btn-block" type="submit">Login</button>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>
