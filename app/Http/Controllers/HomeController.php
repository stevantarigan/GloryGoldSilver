<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
{
    $articles = Article::orderBy('published_at', 'desc')->take(3)->get(); // ambil 3 artikel terbaru
    return view('home', compact('articles'));
}
}
