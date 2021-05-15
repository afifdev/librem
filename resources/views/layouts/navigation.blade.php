@if (auth()->check())
<nav>
    <div class="librem">
        <h2>Librem</h2>
    </div>
    <div class="search">
        <input type="text" name="search" id="search" placeholder="search...">
        <button class="btn-search">search</button>
    </div>
    <div class="profile">
        <!-- <div class="avatar"><img src="../asset/img/Avatar.png" alt=""></div> -->
        <div class="halo">
            <p>Halo, Selamat Siang<br>Pak doniiiii</p>
        </div>
    </div>
</nav>
@else
<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light custom-nav">
    <div class="container-fluid">
        <a class="align-self-center justify-content-around cta" href="{{ route('login') }}">Login</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tatatertib.html">Tata Tertib</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Akhir Navbar -->
@endif
