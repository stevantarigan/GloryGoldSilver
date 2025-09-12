<section id="artikel" class="artikel">
    <div class="section-container">
        <h2 class="section-title">Artikel Terbaru</h2>
        <p class="section-subtitle">Baca informasi seputar emas, perak, dan investasi</p>

        <div class="artikel-grid">
            @foreach ($articles->take(3) as $article)
                <div class="artikel-card">
                    <div class="artikel-image">
                        <img src="{{ $article->thumbnail ?? asset('images/default-article.jpg') }}"
                            alt="{{ $article->title }}">
                    </div>
                    <div class="artikel-content">
                        <h3 class="artikel-title">
                            <a href="{{ route('artikel.show', $article->slug) }}">{{ $article->title }}</a>
                        </h3>
                        <p class="artikel-excerpt">
                            {{ Str::limit(strip_tags($article->content), 120) }}
                        </p>
                        <a href="{{ route('artikel.show', $article->slug) }}" class="artikel-link">
                            Lihat Selengkapnya →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Tombol Lihat Artikel Lainnya -->
        <div class="lihat-artikel-wrapper">
            <a href="{{ route('artikel.index') }}" class="btn-lihat-artikel">
                Lihat Artikel Lainnya
            </a>
        </div>
    </div>
</section>
