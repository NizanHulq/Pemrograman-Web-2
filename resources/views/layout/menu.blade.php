<div class="links">

    <a href="/">Home</a>
    <a href="/about">About Us</a>
    <a href="/contact">Contact Us</a>
    <a href="/github">GitHub</a>
    <a href="/buku">Tabel Buku</a>
    


@if(auth::check() && Auth::user()->level == 'admin')
    <a href="/user">Users</a>
    <a href="/galeri">Galeri Buku</a>
@endif
</div>