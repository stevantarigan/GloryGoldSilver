<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail',
        'author',
        'published_at',
    ];

    // 👉 tambahkan casting biar published_at jadi Carbon otomatis
    protected $casts = [
        'published_at' => 'datetime',
    ];
}


