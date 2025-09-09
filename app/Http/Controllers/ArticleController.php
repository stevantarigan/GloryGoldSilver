<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function show($slug)
{
    $article = Article::where('slug', $slug)->firstOrFail();

    return view('artikel-detail', compact('article'));
}

    // app/Http/Controllers/ArticleController.php
public function index()
{
    $articles = Article::orderBy('published_at', 'desc')->paginate(9);
    return view('partials.artikel.index', compact('articles'));
}






}
