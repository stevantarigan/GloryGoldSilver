@extends('layouts.app')

@section('title', 'Katalog Perak Batangan - Glory Gold')

@section('content')
<section id="katalog-perak" class="produk perak">
    <div class="section-container">
        <h3 class="section-title">Katalog Perak Batangan</h3>
        <p class="section-subtitle">Diversifikasi asetmu dengan koleksi perak batangan berkualitas</p>

        <div class="produk-grid">
            @forelse ($products as $product)
                <div class="produk-card animate-fade">
                    <div class="produk-image silver-bg">
                        @if ($product->image_url && file_exists(public_path($product->image_url)))
                            <img src="{{ asset($product->image_url) }}"
                                 alt="{{ $product->name }}"
                                 style="max-width:120px; border-radius:10px;">
                        @else
                            {{-- Fallback: icon default kalau gambar tidak ada --}}
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
<<<<<<< Updated upstream
                <div class="produk-content">
                    <h4>Perak 10g</h4>
                    <p>Perak batangan 10 gram, pilihan kecil untuk memulai.</p>
                    <a href="#" class="btn-silver">Lihat Detail</a>
                </div>
            </div>

            <div class="produk-card animate-fade delay-100">
                <div class="produk-image silver-bg">
                    <i class="fas fa-gem fa-3x text-silver"></i>
                </div>
                <div class="produk-content">
                    <h4>Perak 50g</h4>
                    <p>Pilihan populer untuk investasi jangka menengah.</p>
                    <a href="#" class="btn-silver">Lihat Detail</a>
                </div>
            </div>

            <div class="produk-card animate-fade delay-200">
                <div class="produk-image silver-bg">
                    <i class="fas fa-gem fa-3x text-silver"></i>
                </div>
                <div class="produk-content">
                    <h4>Perak 100g</h4>
                    <p>Investasi stabil dengan nilai yang mudah dijangkau.</p>
                    <a href="#" class="btn-silver">Lihat Detail</a>
                </div>
            </div>

            <div class="produk-card animate-fade delay-300">
                <div class="produk-image silver-bg">
                    <i class="fas fa-gem fa-3x text-silver"></i>
                </div>
                <div class="produk-content">
                    <h4>Perak 250g</h4>
                    <p>Ukuran menengah untuk diversifikasi portofolio.</p>
                    <a href="#" class="btn-silver">Lihat Detail</a>
                </div>
            </div>

            <div class="produk-card animate-fade delay-400">
                <div class="produk-image silver-bg">
                    <i class="fas fa-gem fa-3x text-silver"></i>
                </div>
                <div class="produk-content">
                    <h4>Perak 500g</h4>
                    <p>Pilihan premium untuk investasi jangka panjang.</p>
                    <a href="#" class="btn-silver">Lihat Detail</a>
                </div>
            </div>

            <div class="produk-card animate-fade delay-500">
                <div class="produk-image silver-bg">
                    <i class="fas fa-gem fa-3x text-silver"></i>
                </div>
                <div class="produk-content">
                    <h4>Perak 1kg</h4>
                    <p>Investasi besar dengan daya simpan tinggi.</p>
                    <a href="#" class="btn-silver">Lihat Detail</a>
                </div>
            </div>
=======
            @empty
                <p>Belum ada produk perak tersedia.</p>
            @endforelse
>>>>>>> Stashed changes
        </div>
    </div>
</section>
@endsection
