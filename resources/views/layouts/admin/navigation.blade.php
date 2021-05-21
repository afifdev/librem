<!-- Header -->
<header>
    <nav>
        <div class="librem">
            <h2>Librem</h2>
        </div>
        <div class="profile">
            <div class="halo">
                <p>Selamat Datang<br>{{ auth()->guard('admin')->user()->name }}</p>
            </div>
        </div>
    </nav>
</header>
<!-- End Header -->
