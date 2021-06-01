<div class="route-home-navigation">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light custom-nav">
        <div class="container-fluid">
            <h2 style="padding: 0 0 0 2rem;">Librem</h2>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? ' active':''}} " aria-current="page"
                            href="{{ route('homepage') }}">Home</a>
                    </li>
                    @if (auth()->guard('teacher')->check() or auth()->guard('student')->check())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('profile') ? ' active':''}}"
                            href="{{ route('profile') }}">Profile</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('rule') ? ' active':''}}"
                            href="{{ route('home-rule') }}">Tata
                            Tertib</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? ' active':''}}"
                            href="{{ route('about') }}">About</a>
                    </li>

                    <!-- User profile -->
                    @if (auth()->guard('teacher')->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle navbar-brand" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->guard('teacher')->user()->name }} </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item custom-dropdown" href="{{ route('logout') }}">LOGOUT</a></li>
                        </ul>
                    </li>
                    @elseif (auth()->guard('student')->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle navbar-brand" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->guard('student')->user()->name }} </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item custom-dropdown" href="{{ route('logout') }}">LOGOUT</a></li>
                        </ul>
                    </li>
                    @elseif (auth()->guard('admin')->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle navbar-brand" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->guard('admin')->user()->name }} </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item custom-dropdown" href="{{ route('logout') }}">LOGOUT</a></li>
                        </ul>
                    </li>
                    @else
                    <!-- Tombol login -->
                    <a class="align-self-center justify-content-center cta m" href="{{ route('login') }}">Login</a>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>
