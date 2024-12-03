@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Produk</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $produk->name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Kategori: {{ $produk->kategori->name }}</h6>
            <p class="card-text">
                <strong>Harga:</strong> Rp {{ number_format($produk->price, 0, ',', '.') }}<br>
                <strong>Stok:</strong> {{ $produk->stock }}<br>
                <strong>Deskripsi:</strong> {{ $produk->description }}
            </p>
            @if($produk->photo)
                <img src="{{ asset('storage/' . $produk->photo) }}" alt="Foto Produk" class="img-fluid mt-3">
            @endif
            <a href="{{ route('produk.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Produk</a>
        </div>
    </div>
</div>
@endsection
