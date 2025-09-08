<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function emas()
    {
        $products = Product::where('type', 'emas')->get();
        return view('katalog-emas', compact('products'));
    }

    public function perak()
    {
        $products = Product::where('type', 'perak')->get();
        return view('katalog-perak', compact('products'));
    }
}
