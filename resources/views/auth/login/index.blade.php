<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <img class="wave" src="{{asset('images/login/back.png')}}">
    <div class="container">
        <div class="judul">
            <h1>Perpustakaan</h1>
            <hr size="10px" width="60px">
            <p>SMA Pelita Nusa</p>
            <div class="but">
                <a href="{{route('homepage')}}">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    &larr;
                </a>
            </div>
        </div>
        <div class="login-content">
            <form action="{{route('postLogin')}}" method="POST">
                @csrf
                <img src="{{asset('images/login/librem2.png')}}">
                <h3>Librem</h3><br>
                <div class="form-label-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                </div>
                <br>
                <div class="form-label-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <br>
                <div class="form-label-group">
                    <select class="form-select" name="level">
                        <option value="admin">Admin</option>
                        <option value="teacher">Teacher</option>
                        <option value="student">Student</option>
                    </select>
                </div>
                <button class="btn btn-lg btn-success btn-block" type="submit">Login</button>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/login/main.js')}}"></script>
</body>

</html>