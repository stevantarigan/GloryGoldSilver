<header>
    <div class="logo">
        <a href="{{ url('/') }}" class="logo-link">
            <i class="fas fa-crown logo-icon"></i>
            <h1>Glory Gold</h1>
        </a>
    </div>

    {{-- Tampilkan menu navigasi hanya jika bukan halaman artikel lengkap atau detail --}}
    @if (!Request::routeIs('artikel.index') && !Request::routeIs('artikel.show'))
    <nav>
        <div class="nav-item">
            <a href="#produk">Produk <i class="fas fa-chevron-down"></i></a>
            <div class="dropdown">
                <a href="{{ route('katalog.emas') }}">Emas</a>
                <a href="{{ route('katalog.perak') }}">Perak</a>
            </div>
        </div>
        <a href="#harga">Harga</a>
        <a href="#tentang">Tentang</a>
        <a href="#artikel">Artikel</a>
        <a href="#kontak">Kontak</a>
    </nav>
    @endif
</header>
