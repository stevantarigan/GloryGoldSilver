@extends('layouts.app')

@section('title', 'Katalog Emas Batangan - Glory Gold')

@section('content')
    <!-- Tombol Back ke Home -->
    <a href="{{ url('/') }}" class="btn-gold back-home-btn">
        ← Back ke Home
    </a>
    <section id="katalog" class="produk">
        <div class="section-container">
        </div>
    </section>
@endsection
