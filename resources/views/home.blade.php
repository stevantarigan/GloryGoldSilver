@extends('layouts.app')

@section('title', 'Glory Gold - Investasi Emas & Perak')

@section('content')
    @include('partials.hero')
    @include('partials.produk')
    @include('partials.harga')
    @include('partials.tentang')
@include('partials.artikel', ['articles' => $articles])
    @include('partials.kontak')

@endsection
