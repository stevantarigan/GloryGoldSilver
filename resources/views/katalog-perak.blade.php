@extends('layouts.app2')

@section('title', 'Katalog Perak Batangan - Glory Gold')

@section('content')
    <!-- Tombol Back ke Home -->
    <a href="{{ url('/') }}" class="btn-silver1 back-home-btn">
        ← Back ke Home
    </a>

    <section id="katalog-perak" class="produk perak">
        <div class="section-container">
            <h3 class="section-title">Katalog Perak Batangan</h3>
            <p class="section-subtitle">Diversifikasi asetmu dengan koleksi perak batangan berkualitas</p>

            <div class="produk-grid">
                @forelse ($products as $product)
                    <div class="produk-card animate-fade">
                        <div class="produk-image silver-bg">
                            @if ($product->image_url)
                                <img src="{{ asset(ltrim($product->image_url, '/')) }}" alt="{{ $product->name }}"
                                    style="max-width:120px; border-radius:10px;">
                            @else
                                <i class="fas fa-gem fa-3x text-silver"></i>
                            @endif
                        </div>
                        <div class="produk-content">
                            <h4>{{ $product->name }}</h4>
                            <p>{{ $product->description }}</p>
                            <p><strong>Rp {{ number_format($product->price, 0, ',', '.') }}</strong></p>
                            <a href="#" class="btn-silver">Lihat Detail</a>
                        </div>
                    </div>
                @empty
                    <p>Belum ada produk perak tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
