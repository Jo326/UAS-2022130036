@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Kategori</h1>

    <p><strong>Nama:</strong> {{ $kategori->name }}</p>
    <p><strong>Deskripsi:</strong> {{ $kategori->description }}</p>

    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
</div>
@endsection
