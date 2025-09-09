@extends('layouts.app')

@section('title', $article->title . ' - Glory Gold')

@section('content')
<section id="artikel-detail" class="artikel-detail">
    <div class="section-container">

        <!-- Tombol Back -->
        <a href="{{ route('home') }}#artikel" class="btn-back">← Kembali ke Artikel</a>

        <div class="artikel-detail-wrapper">
            <!-- Gambar Kiri -->
            <div class="artikel-image">
                <img src="{{ $article->thumbnail ?? asset('images/default-article.jpg') }}"
                     alt="{{ $article->title }}">
            </div>

            <!-- Konten Kanan -->
            <div class="artikel-content">
                <h1 class="artikel-title">{{ $article->title }}</h1>
                <p class="artikel-meta">
                    <i class="far fa-user"></i> {{ $article->author ?? 'Admin' }}
                    &nbsp; | &nbsp;
                    <i class="far fa-calendar-alt"></i>
                    {{ optional($article->published_at)->format('d M Y') }}
                </p>
                <div class="artikel-text">
                    {!! nl2br(e($article->content)) !!}
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
