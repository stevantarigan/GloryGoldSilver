<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Tips Investasi Emas Bagi Pemula',
                'slug' => Str::slug('Tips Investasi Emas Bagi Pemula'),
                'content' => 'Emas adalah instrumen investasi yang stabil. Artikel ini membahas tips memulai investasi emas bagi pemula.',
                'thumbnail' => 'articles/investasi-emas.jpg',
                'author' => 'Admin Glory Gold',
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title' => 'Mengapa Harga Emas Selalu Naik?',
                'slug' => Str::slug('Mengapa Harga Emas Selalu Naik?'),
                'content' => 'Harga emas cenderung naik dalam jangka panjang. Artikel ini menjelaskan faktor-faktor yang mempengaruhi harga emas.',
                'thumbnail' => 'articles/harga-emas.jpg',
                'author' => 'Jonathan',
                'published_at' => Carbon::now()->subDays(4),
            ],
            [
                'title' => 'Perbandingan Investasi Emas dan Perak',
                'slug' => Str::slug('Perbandingan Investasi Emas dan Perak'),
                'content' => 'Emas dan perak memiliki kelebihan dan kekurangannya masing-masing. Artikel ini membandingkan keduanya.',
                'thumbnail' => 'articles/emas-vs-perak.jpg',
                'author' => 'Praisley',
                'published_at' => Carbon::now()->subDays(3),
            ],
            [
                'title' => 'Cara Menyimpan Emas yang Aman',
                'slug' => Str::slug('Cara Menyimpan Emas yang Aman'),
                'content' => 'Penyimpanan emas perlu diperhatikan agar aman dari pencurian maupun kerusakan.',
                'thumbnail' => 'articles/penyimpanan-emas.jpg',
                'author' => 'Stevan',
                'published_at' => Carbon::now()->subDays(2),
            ],
            [
                'title' => 'Prospek Investasi Emas di Tahun 2025',
                'slug' => Str::slug('Prospek Investasi Emas di Tahun 2025'),
                'content' => 'Bagaimana prediksi harga emas di tahun 2025? Artikel ini membahas prospeknya.',
                'thumbnail' => 'articles/prospek-emas-2025.jpg',
                'author' => 'Admin Glory Gold',
                'published_at' => Carbon::now()->subDay(),
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
