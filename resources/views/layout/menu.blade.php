<div class="links">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/about">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/contact">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/github">GitHub</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Data
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/buku">Tabel Buku</a></li>
          @if(auth::check() && Auth::user()->level == 'admin')
            <li><a class="dropdown-item" href="/user">Users</a></li>
            <li><a class="dropdown-item" href="/galeri">Galeri Buku</a></li>
            @endif
          </ul>
        </li>
        </ul>

    <!-- <a href="/">Home</a>
    <a href="/about">About Us</a>
    <a href="/contact">Contact Us</a>
    <a href="/github">GitHub</a> -->
    <!-- <a href="/buku">Tabel Buku</a> -->


<!-- @if(auth::check() && Auth::user()->level == 'admin')
    <a href="/user">Users</a>
    <a href="/galeri">Galeri Buku</a>
@endif -->
</div>