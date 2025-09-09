@extends('layouts.app')

@section('title', 'Artikel - Glory Gold')

@section('content')
<section id="artikel" class="artikel">
    <div class="section-container">
        <h2 class="section-title">Semua Artikel</h2>
        <p class="section-subtitle">Temukan artikel lengkap seputar emas, perak, dan investasi</p>

        <div class="artikel-grid">
            @foreach($articles as $article)
                <div class="artikel-card">
                    <div class="artikel-image">
                        <img src="{{ $article->thumbnail ?? asset('images/default-article.jpg') }}"
                             alt="{{ $article->title }}">
                    </div>
                    <div class="artikel-content">
                        <h3 class="artikel-title">
                            <a href="{{ route('artikel.show', $article->slug) }}">
                                {{ $article->title }}
                            </a>
                        </h3>
                        <p class="artikel-excerpt">
                            {{ Str::limit(strip_tags($article->content), 150) }}
                        </p>
                        <a href="{{ route('artikel.show', $article->slug) }}" class="artikel-link">
                            Lihat Selengkapnya →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <!-- Pagination -->
<div class="pagination-wrapper">
    {{ $articles->onEachSide(1)->links('partials.pagination') }}
</div>

    </div>
</section>
@endsection
