@extends('layouts.app')

@section('title', 'Katalog Emas Batangan - Glory Gold')

@section('content')
<section id="katalog" class="produk">
    <div class="section-container">
        <h3 class="section-title">Katalog Emas Batangan</h3>
        <p class="section-subtitle">Pilih ukuran emas batangan sesuai kebutuhan investasimu</p>

        <div class="produk-grid">
            @forelse ($products as $product)
                <div class="produk-card animate-fade">
                    <div class="produk-image">
                        @if ($product->image_url && file_exists(public_path($product->image_url)))
                            <img src="{{ asset($product->image_url) }}"
                                 alt="{{ $product->name }}"
                                 style="max-width:120px; border-radius:10px;">
                        @else
                            {{-- Fallback: icon default kalau gambar tidak ada --}}
                            <i class="fas fa-cube fa-3x"></i>
                        @endif
                    </div>
                    <div class="produk-content">
                        <h4>{{ $product->name }}</h4>
                        <p>{{ $product->description }}</p>
                        <p><strong>Rp {{ number_format($product->price, 0, ',', '.') }}</strong></p>
                        <a href="#" class="btn-gold">Lihat Detail</a>
                    </div>
                </div>
            @empty
                <p>Belum ada produk emas tersedia.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
